<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function days()
    {
        return $this->belongsTo(RefDaySchedule::class, 'day_id', 'id');
    }

    public function start_times()
    {
        return $this->belongsTo(RefTimeSchedule::class, 'start_time', 'id');
    }

    public function end_times()
    {
        return $this->belongsTo(RefTimeSchedule::class, 'end_time', 'id');
    }
}
