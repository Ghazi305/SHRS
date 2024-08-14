<div id="sidebar" class="bg-light position-fixed top-0 bottom-0 end-0 p-3" style="width: 260px;">
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="{{ route('dashboard') }}">
                <i class="fas fa-home icon me-2"></i>
                <span class="text">الرئيسية</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="{{ route('bookings.index') }}">
                <i class="fas fa-calendar-check icon me-2"></i>
                <span class="text">الحجوزات</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="{{ route('rooms.manageRooms') }}">
                <i class="fas fa-bed icon me-2"></i>
                <span class="text">إدارة الغرف</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="{{ route('students.index') }}">
                <i class="fas fa-user-graduate icon me-2"></i>
                <span class="text">إدارة الطلاب</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center" href="#">
                <i class="fas fa-cogs icon me-2"></i>
                <span class="text">الإعدادات</span>
            </a>
        </li>
        <li class="nav-item mt-auto">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf 
                <button type="submit" class="nav-link btn btn-link d-flex align-items-center">
                    <i class="fas fa-sign-out-alt icon me-2"></i>  
                    <span class="text">تسجيل الخروج</span>
                </button>
            </form>
        </li>
    </ul>
</div>