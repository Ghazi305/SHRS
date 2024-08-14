@extends('admin.layouts.main_login')

@section('title', 'تسجيل مستخدم جديد')


@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
           <h4>تسجيل مستخدم جديد</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.register') }}">
            @csrf
            <div class="form-group mb-3">
              <label for="name">الاسم الكامل</label>
             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
             @error('name')
             <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong></span>
             @enderror
            </div>
            <div class="form-group mb-3">
              <label for="email">البريد الإلكتروني</label>
             <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
               @error('email')
              <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
             </span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="phone">رقم الهاتف</label>
             <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
               @error('email')
              <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
             </span>
              @enderror
            </div>
            <div class="form-group mb-3">
               <label for="password">كلمة المرور</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
              <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
               </span>
                 @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password-confirm">تأكيد كلمة المرور</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
              </div>
           <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
