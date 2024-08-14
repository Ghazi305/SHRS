<header class="bg-dark text-white p-3">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>لوحة التحكم</h1><form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-link">
                    <i class="fas fa-sign-out-alt icon"></i>
                    <span class="text">تسجيل الخروج</span>
                </button>
            </form>
            
        </div>
    </div>
</header>