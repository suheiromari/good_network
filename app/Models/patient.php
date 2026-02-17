<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patient extends Model
{




    /** @use HasFactory<\Database\Factories\PatientsFactory> */
    use HasFactory;

    protected $fillable = ['name', 'dob', 'phone', 'email'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
    public function visits()
    {
        return $this->hasMany(visit::class);
    }
}
