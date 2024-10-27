<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class ScheduleSettings extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "schedule_settings";

    protected $fillable = [
    'ss_shift_title',
    'ss_time_from',
    'ss_time_to',
    'ss_minutes',
    'isAvailable',

    ];
}
