<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'student_id', 
        'room_id', 
        'date',
        'checkin', 
        'checkout', 
        'status' 
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
