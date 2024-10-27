<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class AttendanceSheet extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "attendance_sheet";

    protected $fillable = [
    'atd_emp_id',
    'atd_date',
    'atd_in',
    'atd_break_out',
    'atd_break_in',
    'atd_out',
    'atd_ot',
    'atd_late',
    'atd_minutes',

    ];

    public function atdEmp():BelongsTo
    {
        return $this->belongsTo(ScheduleProfile::class,'atd_emp_id');
    }
}
