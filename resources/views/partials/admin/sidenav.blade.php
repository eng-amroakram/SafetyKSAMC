<nav id="sidenav-1" class="sidenav ps ps--active-y" data-mdb-color="light" style="background-color: #2d2c2c"
    role="navigation" data-mdb-mode="side" data-mdb-right="false" data-mdb-hidden="false" data-mdb-accordion="true">

    <a class="ripple d-flex justify-content-center py-5" style="padding-top: 5rem !important;"
        href="{{ route('admin.panel.index') }}" data-ripple-color="primary">

        <img id="SafteyKSAMC-Logo" width="200" src="{{ asset('assets/web/images/logo.jpeg') }}" alt="SafteyKSAMC-Logo"
            draggable="false" />
    </a>

    <ul class="sidenav-menu">

        <li class="sidenav-item">
            <a class="sidenav-link" href="{{ route('admin.panel.index') }}">
                <i class="fas fa-chart-area pr-4 me-2 fs-6 fw-bold"></i><span>الصفحة الرئيسية</span></a>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link" href="{{ route('admin.panel.users') }}">
                <i class="fas fa-users-gear pr-4 me-2 fs-6 fw-bold"></i><span>الموظفين</span></a>
        </li>

        {{-- <li class="sidenav-item">
            <a class="sidenav-link" href="{{ route('admin.panel.contact-us') }}">
                <i class="fas fa-comment-dots pr-4 me-2"></i>
                <span>استفسار العملاء</span>
            </a>
        </li> --}}

    </ul>
</nav>
