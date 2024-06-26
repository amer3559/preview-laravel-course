<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\GenderEnum;
use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $primaryKey = 'user_id';


    protected $fillable = [
        'name',
        'age_day',
        'age_month',
        'age_year',
        'address',
        'phone_number',
        'email',
        'password',
        'gender',
        'role',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
//        'role' => UserRoleEnum::class,
//        'gender' => GenderEnum::class
    ];


    public function visitorTickets()
    {
        return $this->hasMany(Ticket::class,'patient_id', 'id');
    }
    public function doctorTickets()
    {
        return $this->hasMany(Ticket::class,'doctor_id', 'id');
    }

//    public function tickets()
//    {
//        return $this->hasMany(Ticket::class, 'patient_id', 'user_id');
//    }
//    public function operations()
//    {
//        return $this->hasMany(Operation::class, 'doctor_id', 'user_id');
//    }



}
