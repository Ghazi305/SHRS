<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;

// صفحة الداشبورد - تتطلب تسجيل الدخول
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// مسارات الطلاب
Route::post('/check-university-id', [StudentController::class, 'checkUniversityId']);

// مسارات الحجوزات
Route::post('/book-room', [BookingController::class, 'create'])->name('bookings.create');
 
// مسارات تسجيل الدخول والتسجيل للإدارة
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('register', [AuthController::class, 'register']);
});

// مسارات الإدارة - تتطلب تسجيل الدخول
Route::prefix('admin')->middleware('auth')->group(function () {
    // مسارات الطلاب
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/register-student', [StudentController::class, 'create'])->name('student.create');
    Route::delete('/students/destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    
    // مسارات الحجوزات
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/destroy/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    
    // مسارات الغرف
    Route::post('/rooms', [RoomController::class, 'create'])->name('rooms.create');
    Route::get('/rooms', [RoomController::class, 'manageRooms'])->name('rooms.manageRooms');
    Route::delete('/rooms/destroy/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/update/{id}', [RoomController::class, 'update'])->name('rooms.update');
    
    // مسار تسجيل الخروج
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout'); 
});

// الصفحات الثابتة
Route::get('/', [RoomController::class, 'selectRooms']);
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/contact', function () { return view('contact'); });
Route::get('/about', function () { return view('about'); });

