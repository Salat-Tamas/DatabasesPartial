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
}
