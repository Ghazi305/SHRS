@extends('admin.layouts.main')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">لوحة التحكم</h2>

    <div class="row mb-4">
        <!-- بطاقة عدد الطلاب -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">عدد الطلاب</h5>
                    <p class="card-text display-4">{{ $studentCount }}</p>
                </div>
            </div>
        </div>

        <!-- بطاقة عدد الحجوزات-->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">عدد الغرف</h5>
                    <p class="card-text display-4">{{ $roomCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">عدد الحجوزات</h5>
                    <p class="card-text display-4">{{ $bookingCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- جدول الحجوزات -->
    <h3 class="text-center mb-4">الحجوزات</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>رقم الحجز</th>
                    <th>اسم الطالب</th>
                    <th>رقم الغرفة</th>
                    <th>تاريخ الدخول</th>
                    <th>تاريخ الخروج</th>
                    <th>الحالة</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->student->name }}</td>
                        <td>{{ $booking->room->number }}</td>
                        <td>{{ $booking->checkin }}</td>
                        <td>{{ $booking->checkout }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">لا توجد حجوزات حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection