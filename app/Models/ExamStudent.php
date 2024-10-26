<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamStudent extends Model
{
    protected $fillable = [
        'name',
        'schoolCode',
        'schoolName',
        'shortSchoolName',
        'schoolType',
        'medium',
        'location',
        'countyCode',
        'county',
        'nationality',
        'romanian',
        'mathematics',
        'native',
        'avg',
    ];
}
