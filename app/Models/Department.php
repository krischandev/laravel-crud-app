<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "employees_department";

    protected $fillable = [
    'dept_title',
    ];

    public function deptPos()
    {
        return $this->hasMany(Position::class,'post_dept_id');
    }
}
