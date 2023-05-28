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
        'staff_id',
        'slot_id',
        'type',
        'is_confirmed',
        'created_by_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function staffs()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }

    public function slots()
    {
        return $this->hasOne(Slot::class, 'id', 'slot_id');
    }
}
