@extends('admin.layouts.main')

@section('content')
<div class="w-100 h-100">
  <h3>إدارة الطلاب</h3>
  <div class="container mt-5">
    <h2 class="text-center mb-4">إضافة طالب جديد</h2>
    
    @if (session('success')) 
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
     @endif
<form method="POST" action="{{ route('student.create') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="name">الاسم الكامل</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="university_id">الرقم الجامعي</label>
            <input type="number" id="university_id" name="university_id" class="form-control @error('university_id') is-invalid @enderror" value="{{ old('university_id') }}" required>
            @error('university_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="phone">رقم الهاتف</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="gender">الجنس</label>
            <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                <option value="">اختر الجنس</option>
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
            <input type="date" id="date_birth" name="date_birth" class="form-control @error('date_birth') is-invalid @enderror" value="{{ old('date_birth') }}" required>
            @error('date_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="program">البرنامج الدراسي</label>
            <input type="text" id="program" name="program" class="form-control @error('program') is-invalid @enderror" value="{{ old('program') }}" required>
            @error('program')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="year">السنة الدراسية</label>
            <input type="text" id="year" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" required>
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">تسجيل</button>
    </form> 
</div>
  <div class="container mt-5">
 <h3 class="text-center mb-4">الطلاب</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>رقم الطالب</th>
                <th>الاسم</th>
                <th>الرقم الجامعي</th>
                <th>القسم</th>
                <th>البريد الإلكتروني</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
             <tr>
              <td>{{ $student->id }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->university_id }}</td>
              <td>{{ $student->program }}</td>
              <td>{{ $student->email }}</td>
              <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">تعديل</a></td> 
                <td>
                 <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                   @csrf
                   @method('DELETE')
                  <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
   
@endsection