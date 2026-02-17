<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visit;

class Vital extends Model
{
    protected $fillable = [
        'visit_id',
        'temperature',
        'bp_systolic',
        'bp_diastolic',
        'heart_rate',
        'respiratory_rate',
        'oxygen_saturation',
        'weight',
    ];
    /** @use HasFactory<\Database\Factories\VitalFactory> */
    use HasFactory;

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
