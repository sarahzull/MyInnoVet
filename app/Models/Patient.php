<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $table = 'patients';

    protected $fillable = [
        'name',
        'dob',
        'breed',
        'gender',
        'species',
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

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
