@extends('admin.layouts.main_login')

@section('title', 'Login')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-primary text-white text-center">
              <h4>تسجيل الدخول</h4>
          </div> 
         <div class="card-body">
          <form method="POST" action="{{ route('admin.login') }} ">
              @csrf 
           <div class="form-group mb-3">
             <label for="email">البريد الإلكتروني</label>
             <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
              @error('email')
            <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong></span>
               @enderror
         </div>

       <div class="form-group mb-3">
           <label for="password">كلمة المرور</label>
           <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
              @error('password')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong></span>
            @enderror
           </div> 

       <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
        <a class="btn btn-link d-block mt-3" href=""> 
        نسيت كلمة المرور؟</a>
              </form>
            </div>
         </div>
       </div>
    </div>
</div>
@endsection