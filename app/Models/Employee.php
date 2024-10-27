<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "employees";

    protected $fillable = [
    'emp_id',
    'emp_rfid',
    'emp_fn',
    'emp_mn',
    'emp_ln',
    'emp_pos_id',
    'emp_addr',
    'emp_cn',
    'emp_gender',
    'emp_date_hired',
    'status',

    ];

    public function empPos()
    {
        return $this->belongsTo(Position::class,'emp_pos_id');
    }

    public function posID()
    {
        return $this->hasOne(Position::class,'emp_pos_id');
    }

}
