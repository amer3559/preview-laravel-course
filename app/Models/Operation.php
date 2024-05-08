<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'is_running',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
//    public function doctor()
//    {
//        return $this->belongsTo(User::class, 'doctor_id', 'id');
//    }
}
