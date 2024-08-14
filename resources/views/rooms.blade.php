@extends('layouts.main')

@section('title', 'الغرف')

@section('content')
@include('layouts.header')
@include('layouts.style')
<div class="w-100 h-100">
    <h2 class="text-center mb-4">قائمة الغرف</h2>

    <!-- جدول الغرف -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>رقم الغرفة</th>
                <th>المبنى</th>
                <th>السعة</th>
                <th>النوع</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->building }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('layouts.footer')
@endsection