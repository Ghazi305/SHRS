<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 



class StudentController extends Controller
{
    
  public function checkUniversityId(Request $request)
{
    $request->validate([
        'university_id' => 'required|integer',
    ]);

    $student = Student::where('university_id', $request->university_id)->first();

    if ($student) {
        return response()->json(['success' => true, 'student' => $student]);
    } else {
        return response()->json(['success' => false, 'message' => 'الرقم الجامعي غير صحيح.']);
    }
}
 
 
  public function index()
  {
    $students = Student::all();
    
    return view('admin.student', compact('students'));
  } 
  
   public function menageStudents()
   {
     $students = Student::all();
     return view('admin.student', compact('students'));
   }
    
   public function create(Request $request)
   { 
      $validatedData = $request->validate([
         'name' => 'required|string|max:64',
         'university_id' => 'required|integer|unique:students',
         'email' => 'required|email|max:64|unique:students',
         'phone' => 'required|string|max:20',
         'gender' => 'required|string|max:12', 
         'date_birth' => 'required|date',
         'program' => 'required|string|max:34',
         'year' => 'required|string|max:4',
        ]);
        
        $student = Student::create($validatedData);
        return redirect()->route('students.index')->with('success', 'تم تسجيل الطالب بنجاح!');
   }
    
    public function update(Request $request, $id)
    {
      
      $request->validate([
        'name' => 'required|string|max:64',
         'university_id' => 'required|integer',
         'email' => 'required|email|max:64',
         'phone' => 'required|string|max:20',
         'gender' => 'required|string|max:12', 
         'date_birth' => 'required|date',
         'program' => 'required|string|max:34',
         'year' => 'required|string|max:4',
       ]); 
      
      $student = Student::findOrFail($id); 
      
      $student->update([
        'name' => $request->input('name'),
        'university_id' => $request->input('university_id'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'gender' => $request->input('gender'),
        'program' => $request->input('program'),
        'year' => $request->input('year'),
        ]);
        
        return redirect()->route('students.index')->with('success', 'تم تعديل البيانات بنجاح');
      
    }
    
    public function edit($id)
    {
      $student = Student::findOrFail($id);
      
      return view('admin.editStudent',compact('student')); 
    }
     
    public function destroy($id)
    {
      $student = Student::find($id);
      if (!$student) { 
           return redirect()->route('students.index')->with('error', 'الطالب غير موجود');
        }
      $student->delete();
      
       return redirect()->route('students.index')->with('success', 'تم الحذف بنجاح');
    }
 }
