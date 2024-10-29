<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamStudent;

class SiteController extends Controller
{
    protected $filteredStudents;

    public function __construct(){
        $this->filteredStudents = collect();
    }

    public function index()
    {
        return view('index');
    }

    public function category($category)
    {
        // Map the category name to the actual attribute
        $attribute = $this->mapCategoryToAttribute($category);

        if (!$attribute) {
            abort(404, "Category not found.");
        }

        return view('categories.' . $category, [
            'category' => $category,
        ]);
    }

    public function subcategory($category, $subcategory)
    {
        // Map the category name to the actual attribute
        $attribute = $this->mapCategoryToAttribute($category);

        // Ensure the attribute is valid
        if (!$attribute) {
            abort(404); // If the mapping fails, return a 404
        }

        // Fetch students based on the mapped attribute and the subcategory value
        $students = ExamStudent::where($attribute, $subcategory)->orderByDesc('avg')->get();

        // No students found, but do not abort. Instead, pass an empty collection.
        return view("categories.show", [
            'category' => $category,
            'subcategory' => $subcategory,
            'students' => $students // This could be an empty collection, but won't abort.
        ]);
    }

    // Helper function to map category to the actual attribute in the database
    private function mapCategoryToAttribute($category)
    {
        $mapping = [
            'locations' => 'location',
            'counties' => 'county',
            'nationalities' => 'nationality',
            'schools' => 'schoolName', // or other relevant attribute
            'schoolTypes' => 'schoolType'
        ];

        return $mapping[$category] ?? null;
    }

    // Updated filterStudents function to handle both attribute filters and request filters
    public function filterStudents($attribute, $value)
    {
        $students = ExamStudent::query();

        // Apply main filter based on attribute and subcategory value
        if ($attribute && $value) {
            return $students->where($attribute, '=', $value);
        }

        return $students;
    }
}
