<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Google Fonts: Tajawal Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- MDB & Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/mdb.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/card.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/modals.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/lightbox.css') }}"> --}}

    <link rel="icon" type="image/png" href="{{ asset('assets/web/images/logo.jpeg') }}">

    <style>
        /* ✅ خطوط عربية أكبر */
        body,
        html {
            font-family: 'Tajawal', sans-serif !important;
            font-size: 18px;
            line-height: 1.8;
        }

        h1 {
            font-size: 2.625rem;
            /* 42px */
            font-weight: 700;
        }

        h2 {
            font-size: 2.125rem;
            /* 34px */
            font-weight: 600;
        }

        h3 {
            font-size: 1.875rem;
            /* 30px */
            font-weight: 600;
        }

        h4 {
            font-size: 1.625rem;
            /* 26px */
            font-weight: 500;
        }

        h5 {
            font-size: 1.375rem;
            /* 22px */
            font-weight: 500;
        }

        h6 {
            font-size: 1.25rem;
            /* 20px */
            font-weight: 500;
        }

        p {
            font-size: 1.125rem;
            /* 18px */
            font-weight: 400;
        }

        small {
            font-size: 1rem;
            /* 16px */
        }

        label,
        input,
        select,
        textarea,
        button {
            font-family: 'Tajawal', sans-serif !important;
            font-size: 1.125rem;
            /* 18px */
        }

        table {
            font-size: 1.05rem;
            /* 17px */
        }

        .btn {
            font-size: 1.125rem;
            /* 18px */
        }

        .mdb-docs-layout {
            padding-right: 240px;
        }

        @media (max-width: 1440px) {
            .mdb-docs-layout {
                padding-right: 0px;
            }
        }

        .color-green {
            color: rgb(1, 161, 127);
        }
    </style>

    @livewireStyles()
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</head>

<body>
    <header>
        @include('partials.admin.sidenav')
        @include('partials.admin.navbar')
    </header>

    <main id="main-screen" class="mdb-docs-layout">
        {{ $slot }}
    </main>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('assets/admin/js/new-prism.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/popper.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            const sidenav = document.getElementById("sidenav-1");
            const instance = mdb.Sidenav.getInstance(sidenav);

            let innerWidth = null;

            const setMode = (e) => {
                if (window.innerWidth === innerWidth) return;
                innerWidth = window.innerWidth;

                if (window.innerWidth < 1700) {
                    instance.changeMode("over");
                    instance.hide();
                } else {
                    instance.changeMode("side");
                    instance.show();
                }
            };

            setMode();
            window.addEventListener("resize", setMode);

            $(".navbar-toggler").on("click", function() {
                const sidebar = $("#sidenav-1");
                if (sidebar.css("transform") === "matrix(1, 0, 0, 1, 0, 0)") {
                    sidebar.css("transform", "translateX(100%)");
                } else {
                    sidebar.css("transform", "translateX(0%)");
                }
            });

            $(document).on("click", function(e) {
                const sidebar = $("#sidenav-1");
                if (!$(e.target).closest("#sidenav-1, .navbar-toggler").length) {
                    sidebar.css("transform", "translateX(100%)");
                }
            });

            $("#sidenav-1").on("click", function(e) {
                e.stopPropagation();
            });
        });
    </script>

    @livewireScripts()
    @stack('scripts')
</body>

</html>
