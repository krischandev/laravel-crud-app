<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class PayrollDeductions extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payroll_deductions";

    protected $fillable = [
    'pd_sss',
    'pd_pagibig',
    'pd_philhealth',
    'pd_others',

    ];

}
