<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Student;
use App\Models\Room;

class BookingController extends Controller
{
    public function index()
    {
      $bookings = Booking::all();
      
      return view('admin.bookings', compact('bookings')); 
    }
    
    public function create(Request $request)
    { 
        $request->validate([ 
          'university_id' => 'required|integer',
          'number' => 'required|integer',
          'date' => 'required|date',
          'checkin' => 'required|date',
          'checkout' => 'required|date',
        ]);

        // Get the student
       $student = Student::where('university_id', $request->university_id)->first();

        // Get the room 
      $room = Room::where('number', $request->number)->first();

        // Create booking
      Booking::create([
         'student_id' => $student->id,
         'room_id' => $room->id,
         'date' => $request->date, 
         'checkin' => $request->checkin,
         'checkout' => $request->checkout,
         'status' => 'مؤكد',
        ]); 

        return redirect()->back()->with('success', 'تم تأكيد الحجز بنجاح.');
    }
    
     
    public function destroy($id)
    {
      $booking = Booking::find($id);
      
      if (!$booking) {
        return redirect()->route('bookings.index')->with('error','لا يوجد حجز'); 
      }
      $booking->delete();
      return redirect()->route('bookings.index')->with('success','تم حذف الحجز بنجاح');
    }
}