<header class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg section-background">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand text-white" href="#">
                <img src="{{ asset('assets/web/images/logo.jpeg') }}" alt="Logo" width="40" height="40"
                    class="d-inline-block align-text-top img-rounded">
            </a>
            <!-- Toggle button for mobile view -->
            <button data-mdb-collapse-init class="navbar-toggler text-white" type="button"
                data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <!-- Navbar links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-white" aria-current="page" href="#">
                            الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#our-services">خدماتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about-us">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact-us">تواصل معنا</a>
                    </li>
                </ul>
                <!-- Login button -->
                @guest
                    <a href="{{ route('web.login') }}" class="btn btn-outline-light">تسجيل الدخول</a>
                @endguest

                @auth
                    <a href="{{ route('web.logout') }}" class="btn btn-outline-light">تسجيل الخروج</a>
                @endauth
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>
