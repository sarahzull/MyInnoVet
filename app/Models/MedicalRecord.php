<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    public $table = 'medical_records';

    protected $fillable = [
        'patient_id',
        'diagnosis',
        'treatment',
        'medication',
        'start_date',
        'end_date',
        'created_by_id',
        'appointment_id', 
        'walk_in_id',
        'is_confirmed'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function walkIn()
    {
        return $this->belongsTo(WalkIn::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
