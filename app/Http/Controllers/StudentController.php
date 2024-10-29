<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamStudent;

class StudentController extends Controller
{
    public function show(ExamStudent $student){
        return view('students.show', [
            'student' => $student,
        ]);
    }

    public function result(Request $request) {
        $students = self::search($request);

        $filters = [
            'mediums' => ExamStudent::distinct()->pluck('medium'),
            'schoolNames' => ExamStudent::distinct()->pluck('schoolName'),
            'schoolTypes' => ExamStudent::distinct()->pluck('schoolType'),
            'nationalities' => ExamStudent::distinct()->pluck('nationality'),
            'counties' => ExamStudent::distinct()->pluck('county'),
            'locations' => ExamStudent::distinct()->pluck('location'),
        ];

        return view('students.index', [
            'students' => $students,
            'search' => $request->input('search'),
            'filters' => $filters,
        ]);
    }

    private function search(Request $request) {
        $query = ExamStudent::query();

        $filters = [
            'search' => ['location', 'county', 'nationality', 'schoolType', 'schoolName', 'shortSchoolName', 'schoolCode', 'name', 'medium', 'native'],
            'location' => 'location',
            'county' => 'county',
            'nationality' => 'nationality',
            'schoolType' => 'schoolType',
            'schoolName' => 'schoolName',
            'schoolCode' => 'schoolCode',
            'name' => 'name',
            'medium' => 'medium',
            'native' => 'native',
        ];

        foreach ($filters as $param => $columns) {
            if ($request->has($param) && $request->input($param) !== null) {
                $value = '%' . $request->input($param) . '%';
                if (is_array($columns)) {
                    $query->where(function($q) use ($columns, $value) {
                        foreach ($columns as $column) {
                            $q->orWhere($column, 'like', $value);
                        }
                    });
                } else {
                    $query->where($columns, 'like', $value);
                }
            }
        }

        return $query->get();
    }

}
