<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'school',
        'city',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relationship with Purchase model
     * A student can have many purchases.
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'student_id', 'id');
    }

    /**
     * Get active lessons for the student based on purchases.
     * This retrieves all lessons the student has purchased.
     */
    public function activeLessons()
    {
        return $this->hasManyThrough(Lesson::class, Purchase::class, 'student_id', 'id', 'id', 'lesson_id')
                    ->where('lesson_date', '>=', now());  // Only fetch future lessons
    }
}
