<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vital;

class Visit extends Model
{
    protected $fillable = ['patient_id', 'prescription', 'visit_date', 'diagnosis', 'notes'];
    //
    public function patient()
    {
        return $this->belongsTo(patient::class);
    }
    public function Vital()
    {
        return  $this->hasOne(Vital::class);
    }
}
