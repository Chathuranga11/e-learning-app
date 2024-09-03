<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'subjects', 'city'];

    // Example relationship with courses (if exists)
    //public function courses()
    //{
    //   return $this->hasMany(Course::class);
    //}
}
