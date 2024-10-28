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
        $students = ExamStudent::where($attribute, $subcategory)->get();
    
        // No students found, but do not abort. Instead, pass an empty collection.
        return view("categories.$category.show", [
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
    public function filterStudents($attribute = null, $value = null, Request $request = null)
    {
        $students = ExamStudent::query();

        // Apply main filter based on attribute and subcategory value
        if ($attribute && $value) {
            return $students->where($attribute, '=', $value);
        }

        // Additional filters based on request parameters (for search bar or extra filters)
        if ($request->has('location')) {
            $students->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('county')) {
            $students->where('county', 'like', '%' . $request->county . '%');
        }

        if ($request->has('nationality')) {
            $students->where('nationality', 'like', '%' . $request->nationality . '%');
        }

        if ($request->has('schoolType')) {
            $students->where('schoolType', 'like', '%' . $request->schoolType . '%');
        }

        if ($request->has('schoolName')) {
            $students->where('schoolName', 'like', '%' . $request->schoolName . '%')
                     ->orWhere('shortSchoolName', 'like', '%' . $request->schoolName . '%');
        }

        if ($request->has('schoolCode')) {
            $students->where('schoolCode', 'like', '%' . $request->schoolCode . '%');
        }

        if ($request->has('name')) {
            $students->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('medium')) {
            $students->where('medium', 'like', '%' . $request->medium . '%');
        }

        if ($request->has('native')) {
            $students->where('native', 'like', '%' . $request->native . '%');
        }

        return $students;
    }
}
