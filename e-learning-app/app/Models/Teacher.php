<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_name',
        'lesson_description',
        'lesson_date',
        'lesson_duration',
        'lesson_fee',
        'lesson_id',
        'teacher_id',
        'subject_id',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate the lesson_id in the format LSID### 
        static::creating(function ($lesson) {
            $latestLesson = self::orderBy('created_at', 'desc')->first();
            $lastId = ($latestLesson && $latestLesson->lesson_id) ? intval(substr($latestLesson->lesson_id, 4)) : 0;
            $lesson->lesson_id = 'LSID' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    // Add the primary key as lesson_id for the model
    protected $primaryKey = 'lesson_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

class Teacher extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'subject_id',
        'city',
        'is_active',
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

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'teacher_id', 'teacher_id');
    }
}
