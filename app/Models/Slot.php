<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date',
    ];

    public function slotDetails()
    {
        return $this->hasOne(RefTimeSlot::class, 'id', 'slot');
    }
}
