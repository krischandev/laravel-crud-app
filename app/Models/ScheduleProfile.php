<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "schedule_profile";

    protected $fillable = [
    'sp_emp_id',
    'sp_ss_id',

    ];

    public function schedEmp():BelongsTo
    {
        return $this->belongsTo(Employee::class,'sp_emp_id');
    }

    public function schedSet():BelongsTo
    {
        return $this->belongsTo(ScheduleSettings::class,'sp_ss_id');
    }
}
