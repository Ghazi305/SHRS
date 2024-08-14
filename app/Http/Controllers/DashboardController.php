<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $roomCount = Room::count();
        $bookingCount = Booking::count();
        $bookings = Booking::with('student', 'room')->latest()->get();

        return view('admin.dashboard', compact('studentCount', 'roomCount','bookingCount', 'bookings')); 
    }
}