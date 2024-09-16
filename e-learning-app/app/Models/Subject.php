<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // If you have a custom primary key
    protected $primaryKey = 'subject_id';

    // If your primary key is not auto-incrementing
    public $incrementing = false;

    // Specify the data type of the primary key if it's not an integer
    protected $keyType = 'string';

    // Specify the attributes that are mass assignable
    protected $fillable = ['name', 'subject_id'];

    // If you don't have timestamps in your table
    public $timestamps = false;
    
}
