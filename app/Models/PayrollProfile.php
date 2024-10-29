<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class PayrollProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payroll_profile";

    protected $fillable = [
    'pp_emp_id',
    'pp_dailyrate',
    'pp_allowance',

    ];

    public function pyrEmp():BelongsTo
    {
        return $this->belongsTo(Employee::class,'pp_emp_id');
    }

    public function pyrProfileMany()
    {
        return $this->hasMany(PayrollSheet::class,'ps_pp_id');
    }
}
