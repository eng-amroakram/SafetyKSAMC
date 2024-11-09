        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Toggle button -->
                <button data-mdb-collapse-init class="navbar-toggler" type="button"
                    data-mdb-target="#navbarRightAlignExample" aria-controls="navbarRightAlignExample"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarRightAlignExample">


                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="{{ asset('assets/web/images/logo.jpeg') }}" height="28" alt="Munagasatcom Brand"
                            loading="lazy" />
                    </a>
                    <!-- Navbar brand -->

                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">الرئيسية</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <ul class="navbar-nav d-flex flex-row">
                        <a href="{{ route('admin.panel.logout') }}" class="color-green" aria-expanded="false">
                            Logout
                            <i class="fas fa-arrow-right-from-bracket text-danger"></i>
                        </a>
                </div>
                <!-- Right elements -->
            </div>

            </div>
            <!-- Container wrapper -->
        </nav>

        <!-- Navbar -->
