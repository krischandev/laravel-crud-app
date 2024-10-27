<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class PayrollSlip extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payroll_slip";

    protected $fillable = [
    'ps_pp_id',
    'ps_date_from',
    'ps_date_to',
    'ps_days',
    'ps_totdeduct',
    'ps_grosspay',
    'pas_netincome',

    ];

    public function pyrProfile():BelongsTo
    {
        return $this->belongsTo(PayrollProfile::class,'ps_pp_id');
    }
}
