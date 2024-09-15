<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'date', 'time', 'duration', 'fee'
    ];

    // Accessor to format the ID with LSID prefix
    public function getFormattedIdAttribute()
    {
        return 'LSID' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}
