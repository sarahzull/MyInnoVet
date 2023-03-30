<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Species extends Model
{
    use HasFactory;

    public $table = 'species';

    protected $fillable = [
        'name',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
