@extends('admin.layouts.main')

@section('title', 'تسجيل طالب جديد')

@section('content') 
<div class="w-100 h-100">
  <h2>إدارة الغرف</h2>
  <div class="container mt-5">
    <h3 class="text-center mb-4">إضافة غرفة جديدة</h3>
    @if (session('success'))
        <div class="alert alert-success text-center"> 
            {{ session('success') }}
        </div>
     @endif
    <form method="POST" action="{{ route('rooms.create') }}"> 
        @csrf
        <div class="form-group">
            <label for="number">رقم الغرفة</label>
            <input type="number" id="number" name="number" class="form-control @error('number') is-invalid @enderror" required>
            @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">نوع الغرفة</label>
            <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" required>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="building">المبنى</label>
            <input type="text" id="building" name="building" class="form-control @error('building') is-invalid @enderror" required>
            @error('building')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="capacity">السعة</label>
            <input type="number" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror" required>
             @error('capacity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">إضافة</button>
    </form>  
  </div>
  <div class="container mt-5"> 
     <h3 class="text-center mb-4">الغرف</h3>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr> 
                <th>رقم</th>
                <th>رقم الغرفة</th>
                <th>المبنى</th>
                <th>السعة</th>
                <th>النوع</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead> 
        <tbody class="text-center">
          @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->number }}</td>
                <td>{{ $room->building }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->type }}</td>
                <td><a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">تعديل</a></td> 
                <td>
                 <form action="{{ route ('rooms.destroy',$room->id) }}" method="POST" style="display:inline;">
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