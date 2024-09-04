<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//class Student extends Model
//{
//    use HasFactory;

//    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'school_name', 'city'];

// Example relationship with courses (if exists)
//  public function courses()
//  {
//     return $this->belongsToMany(Course::class);
// }
//}
class Student extends Authenticatable
{
    use Notifiable;

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
}
