@extends('admin.layouts.main')

@section('content')
<div class="w-100 h-100">
  <div class="container mt-5"> 
    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf 
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">الاسم الكامل</label>
            <input type="text" id="name"
             value="{{ $student->name }}"
             name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="university_id">الرقم الجامعي</label>
            <input type="number"
            value="{{ $student->university_id }}"
            id="university_id" name="university_id" class="form-control @error('university_id') is-invalid @enderror" value="{{ old('university_id') }}" required>
            @error('university_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" 
            value="{{ $student->email }}"
            id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="phone">رقم الهاتف</label>
            <input type="text" 
            value="{{ $student->phone }}"
            id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="gender">الجنس</label>
            <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                <option value="{{ $student->type }}">اختر الجنس</option>
                <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                <option value="أنثى" {{ old('gender') == 'أنثى' ? 'selected' : '' }}>أنثى</option>
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="date_birth">تاريخ الميلاد</label>
            <input type="date" 
            value="{{ $student->date_birth }}"
            id="date_birth" name="date_birth" class="form-control @error('date_birth') is-invalid @enderror" value="{{ old('date_birth') }}" required>
            @error('date_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="program">البرنامج الدراسي</label>
            <input type="text" id="program"
            value="{{ $student->program }}"
            name="program" class="form-control @error('program') is-invalid @enderror" value="{{ old('program') }}" required>
            @error('program')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="year">السنة الدراسية</label>
            <input type="text" id="year"
            value="{{ $student->year }}"
            name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" required>
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">تعديل البيانات</button>
    </form>  
  </div>
</div>
@endsection