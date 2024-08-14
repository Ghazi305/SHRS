@extends('admin.layouts.main')

@section('content')
<div class="w-100 h-100">
<div class="container mt-5">
    <h3>الحجوزات</h3><div class="table-responsive">
      @if (session('success')) 
        <div class="table table-bordered table-striped">
            {{ session('success') }}
        </div>
     @endif
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>رقم الحجز</th>
                    <th>اسم الطالب</th>
                    <th>رقم الغرفة</th>
                    <th>تاريخ الحجز</th>
                    <th>تاريخ الدخول</th>
                    <th>تاريخ الخروج</th>
                    <th>الحالة</th>
                    <th>حذف</th>
                </tr>
            </thead> 
         <tbody class="text-center">
           @forelse($bookings as $booking)
              <tr>
                <td>{{ $booking->id }}</td>
               <td>{{ $booking->student->name }}</td>
               <td>{{ $booking->room->number }}</td>
               <td>{{ $booking->date }}</td>
               <td>{{ $booking->checkin }}</td>
               <td>{{ $booking->checkout }}</td>
                <td>{{ $booking->status }}</td>
                <td> 
                 <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                   @csrf
                   @method('DELETE')
                  <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
              </tr>
                @empty
                 <tr> 
                   <td colspan="8" class="text-center">لا توجد حجوزات حالياً</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
   </div>
</div>
 @endsection