@extends('admin.layouts.main')

@section('title', 'تعديل الغرفة')

@section('content') 
<div class="w-100 h-100">
  <h2>تعديل الغرفة</h2>
  <div class="container mt-5">
    <h3 class="text-center mb-4">تعديل الغرفة</h3>
    @if (session('success'))
        <div class="alert alert-success text-center"> 
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('rooms.update', $room->id) }}"> 
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="number">رقم الغرفة</label>
            <input type="number" id="number" name="number" value="{{ $room->number }}" class="form-control @error('number') is-invalid @enderror" required>
            @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">نوع الغرفة</label>
            <input type="text" id="type" name="type" value="{{ $room->type }}" class="form-control @error('type') is-invalid @enderror" required>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="building">المبنى</label>
            <input type="text" id="building" name="building" value="{{ $room->building }}" class="form-control @error('building') is-invalid @enderror" required>
            @error('building')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="capacity">السعة</label>
            <input type="number" id="capacity" name="capacity" value="{{ $room->capacity }}" class="form-control @error('capacity') is-invalid @enderror" required>
            @error('capacity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">تعديل</button>
    </form>  
  </div>
</div>
@endsection
