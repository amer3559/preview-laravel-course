<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'number',
        'status',
        'attendance',
        'diagnosis',
        'treatment',
    ];

    public function visitor()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class,'ticket_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        try {
            $dateTime = is_string($value) ? new \DateTime($value) : $value;
        } catch (\Exception $e) {
        }
        return \Illuminate\Support\Facades\Date::instance($dateTime)->setTimezone('Africa/Cairo')->format('Y-m-d h:i:s');
    }

//    public function operations()
//    {
//        return $this->hasMany(Operation::class);
//    }
//
//    public function ticketCases()
//    {
//        return $this->hasMany(TicketCase::class);
//    }
}
