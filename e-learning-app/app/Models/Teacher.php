<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class Teacher extends Model
// {
//     use HasFactory;

//     protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'subjects', 'city'];

//     // Example relationship with courses (if exists)
//     //public function courses()
//     //{
//     //   return $this->hasMany(Course::class);
//     //}
// }

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'address',
        'city',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
