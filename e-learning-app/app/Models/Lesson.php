<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

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

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }



    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'lesson_id');
    }

    // Accessor to format the ID with LSID prefix
    public function getFormattedIdAttribute()
    {
        return 'LSID' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'teacher_id');
    }
}
