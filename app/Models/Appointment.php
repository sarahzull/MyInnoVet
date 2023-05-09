<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\MedicalRecord;
use App\Models\AvailableTimeslot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 
        'slot_id', 
        'type', 
        'is_confirmed',
        'created_by_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($appointment) {
            $medicalRecord = new MedicalRecord([
                'client_id' => $appointment->client_id,
                'appointment_id' => $appointment->id,
                'is_confirmed' => false,
            ]);
            $medicalRecord->save();
        });
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function slot()
    {
        return $this->belongsToMany(AvailableTimeslot::class);
    }
}
