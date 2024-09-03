<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'school_name', 'city'];

    // Example relationship with courses (if exists)
    //  public function courses()
    //  {
    //     return $this->belongsToMany(Course::class);
    // }
}
