<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patient extends Model
{
    use HasFactory;

    public $table = 'patients';

    protected $fillable = [
        'name',
        'dob',
        'breed',
        'gender',
        'species_id',
        'height',
        'weight',
        'chronic_disease',
        'image',
        'owner_id',
        'created_by_id'
    ];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function age()
    {
        return Carbon::parse($this->dob)->diff(Carbon::now())->format('%y years, %m months');
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
}
