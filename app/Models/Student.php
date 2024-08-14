<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 
      'university_id', 
      'email', 
      'phone', 
      'gender', 
      'date_birth', 
      'program',
      'year',
      ];
      
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
