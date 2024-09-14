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
            'first_name', 'last_name', 'email', 'mobile', 'password', 'subject_id', 'city', 'is_active',
        ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
}

class Subject extends Model
{
    protected $fillable = ['name', 'subject_id'];

    public static function boot()
    {
        parent::boot();

        // Automatically generate subject_id
        static::creating(function ($subject) {
            $latest = static::latest('id')->first();
            $nextId = $latest ? $latest->id + 1 : 1;
            $subject->subject_id = 'SUB' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
        });
    }
}

