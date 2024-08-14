@extends('layouts.main')

@section('title', 'عن النظام')

@section('content')
@include('layouts.header')
 
<div class="w-100 h-100">
  <div class="container mt-5">
    <h1 class="text-center mb-4">عن النظام</h1>
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="mb-3">مقدمة</h2>
            <p>نظامنا هو الحل المثالي لإدارة حجوزات الغرف السكنية للطلاب. يهدف النظام إلى تبسيط عملية الحجز وتوفير تجربة سهلة وسريعة للطلاب.</p>
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">الميزات</h2>
            <ul class="list-unstyled">
                <li><i class="bi bi-check-circle"></i> واجهة مستخدم بسيطة وسهلة الاستخدام</li>
                <li><i class="bi bi-check-circle"></i> إمكانية الحجز عبر الإنترنت دون الحاجة للذهاب إلى المكتب</li>
                <li><i class="bi bi-check-circle"></i> أمان وحماية بيانات المستخدمين</li>
                <li><i class="bi bi-check-circle"></i> إمكانية إدارة الحجوزات وتعديلها بسهولة</li>
            </ul>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-3">فريق العمل</h2>
            <p>يتكون فريق عملنا من مجموعة من المحترفين ذوي الخبرة في مجال تكنولوجيا المعلومات وإدارة الأنظمة. نحن ملتزمون بتقديم أفضل الخدمات لضمان رضا عملائنا.</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-3">تواصل معنا</h2>
            <p>لأي استفسارات أو مزيد من المعلومات، لا تتردد في <a href="/contact">التواصل معنا</a>.</p>
        </div> 
    </div>
  </div>
</div>

@include('layouts.footer') 
@endsection