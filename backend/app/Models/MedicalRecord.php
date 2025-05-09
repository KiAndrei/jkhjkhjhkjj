<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'visit_date',
        'prescription'
    ];

    protected $casts = [
        'visit_date' => 'date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
