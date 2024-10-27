<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "employees_position";

    protected $fillable = [
    'pos_acronym',
    'pos_title',
    'pos_dept_id',

    ];

    public function posDept()
    {
        return $this->belongsTo(Department::class,'pos_dept_id');
    }

    public function posEmp()
    {
        return $this->hasMany(Employee::class,'emp_pos_id');
    }

    public function posDeptID()
    {
        return $this->hasOne(Department::class,'post_dept_id');
    }
}
