<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }
    
    public function manageRooms()
    { 
        $rooms = Room::all(); 
        return view('admin.rooms', compact('rooms'));
    }
    
    public function selectRooms()
    {
        $rooms = Room::all(); 
        return view('home', compact('rooms'));  
    }
    
    public function create(Request $request)
    { 
        $validatedData = $request->validate([
            'number' => 'required|integer', 
            'building' => 'required|string',
            'capacity' => 'required|integer',
            'type' => 'required|string|max:20',
        ]);
        
        $room = Room::create($validatedData);
        
        return redirect()->route('rooms.create')->with('success', 'تمت الإضافة بنجاح');
    }
    
    public function edit($id)
    {
      $room = Room::findOrFail($id);
       
      return view('admin.editRoom',compact('room')); 
    }
    
    public function update(Request $request, $id)
    {
    $request->validate([
        'number' => 'required|integer',
        'type' => 'required|string|max:255',
        'building' => 'required|string|max:255',
        'capacity' => 'required|integer',
    ]);
 
    $room = Room::findOrFail($id);
    $room->update([
        'number' => $request->input('number'),
        'type' => $request->input('type'),
        'building' => $request->input('building'),
        'capacity' => $request->input('capacity'),
    ]);

    return redirect()->route('rooms.manageRooms')->with('success', 'تم تعديل الغرفة بنجاح');
   } 
    
    public function destroy($id)
    {
        $room = Room::find($id);
        
        if (!$room) {
            return redirect()->route('rooms.manageRooms')->with('error', 'الغرفة غير موجودة.');
        }
         
        $room->delete();
        return redirect()->route('rooms.manageRooms')->with('success', 'تم حذف الغرفة بنجاح.');
    }
}