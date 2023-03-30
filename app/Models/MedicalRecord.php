<?php

namespace App\Models;

use App\Models\Patient;
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
        'created_by_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
