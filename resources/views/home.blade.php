@extends('layouts.main')

@section('title', 'Home')

@section('content')
@include('layouts.header')

<div class="w-100 h-100">
    <div class="jumbotron bg-primary text-white text-center"> 
        <div class="container">
            <h1 class="display-1">مرحبًا بكم في نظام حجوزات الغرف السكنية للطلاب</h1>
            <p class="lead">أفضل طريقة لحجز غرفة سكنية بسهولة وسرعة.</p>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">مزايا النظام</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">سهولة الاستخدام</h5>
                        <p class="card-text">نظامنا سهل الاستخدام ويوفر واجهة بسيطة تساعدك على حجز غرفتك بكل سهولة.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">توفير الوقت</h5>
                        <p class="card-text">وفر وقتك واحجز غرفتك السكنية عبر الإنترنت دون الحاجة إلى زيارة المكتب.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">أمان البيانات</h5>
                        <p class="card-text">نظامنا يحمي بياناتك الشخصية ويضمن سرية معلوماتك الخاصة.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">الخطوات البسيطة لحجز غرفتك</h2>
        @if (session('success'))
          <div class="alert alert-success text-center"> 
            {{ session('success') }}
          </div>
        @endif 
        <div id="university-id-form">
           <div class="card-body">
           <form id="checkUniversityIdForm">
               @csrf
           <div class="form-group mb-3">
            <label for="university_id">أدخل الرقم الجامعي</label>
            <input type="number" id="university_id" name="university_id" class="form-control @error('university_id') is-invalid @enderror" required>
              @error('university_id')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
           </span>
              @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">تأكيد</button>
      </form> 
    </div>
  </div> 

     <div id="booking-form" style="display: none;"> 
       <div class="card-body">
           <h2 class="text-center mb-4">إكمال عملية الحجز</h2>
         <form method="POST" action="{{ route('bookings.create')}}"> 
               @csrf
           <input type="hidden" name="university_id" id="hiddenUniversityId">
          <div class="form-group mb-3">
             <label for="number">رقم الغرفة</label> 
             <select id="number" name="number" class="form-control @error('number') is-invalid @enderror" required>
             <option value="">اختر الغرفة</option>
                @foreach($rooms as $room) 
                  <option value="{{ $room->number }}">{{ $room->number }}</option> 
                 @endforeach
                  </select>  
                 @error('number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                 </span>
                        @enderror
                </div>
         <div class="form-group mb-3">
           <label for="date">تاريخ الحجز</label> 
           <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" required>
               @error('date')
             <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
             </span>
              @enderror
           </div> 
        <div class="form-group mb-3">
            <label for="checkin">تاريخ الدخول</label>
             <input type="date" id="checkin" name="checkin" class="form-control @error('checkin') is-invalid @enderror" required>
              @error('checkin')
             <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
              </span>
              @enderror
           </div>
           
         <div class="form-group mb-3">
           <label for="checkout">تاريخ الخروج</label> 
           <input type="date" id="checkout" name="checkout" class="form-control @error('checkout') is-invalid @enderror" required> 
             @error('checkout')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
             </div>
         <button type="submit" class="btn btn-primary w-100">تأكيد الحجز</button>
          </form>
        </div> 
      </div>
    </div>

    <div class="container mt-5 text-center">
        <h2 class="mb-4">اتصل بنا</h2>
        <p>إذا كنت بحاجة إلى مساعدة أو لديك استفسارات، لا تتردد في <a href="/contact">التواصل معنا</a>.</p>
    </div>
</div>

@include('layouts.footer') 

<script>
document.addEventListener('DOMContentLoaded', function () {
    const formCheckUniversityId = document.getElementById('checkUniversityIdForm');
    const formUniversityId = document.getElementById('university-id-form');
    const formBooking = document.getElementById('booking-form');
    const hiddenUniversityId = document.getElementById('hiddenUniversityId');

    formCheckUniversityId.addEventListener('submit', function (event) {
        event.preventDefault();
        
        const universityId = document.getElementById('university_id').value;

        fetch('/check-university-id', {
           method: 'POST',
           headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ university_id: universityId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                hiddenUniversityId.value = universityId;
                formUniversityId.style.display = 'none';
                formBooking.style.display = 'block';
            } else {
                alert(data.message);
            }
        });
    });
});
</script>
@endsection