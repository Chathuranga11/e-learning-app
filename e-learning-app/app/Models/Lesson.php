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
