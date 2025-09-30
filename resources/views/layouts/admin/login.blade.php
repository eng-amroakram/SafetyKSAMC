<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Google Fonts: Tajawal Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/munagasatcom-logo.png') }}">

    {{-- CSS Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/core.min.css') }}">

    <style>
        /* ✅ Apply Arabic Font & Sizes to All Elements */
        body,
        html {
            font-family: 'Tajawal', sans-serif !important;
            font-size: 16px;
            line-height: 1.6;
        }

        h1 {
            font-size: 2.25rem;
            /* 36px */
            font-weight: 700;
        }

        h2 {
            font-size: 1.75rem;
            /* 28px */
            font-weight: 600;
        }

        h3 {
            font-size: 1.5rem;
            /* 24px */
            font-weight: 600;
        }

        h4 {
            font-size: 1.25rem;
            /* 20px */
            font-weight: 500;
        }

        h5 {
            font-size: 1.125rem;
            /* 18px */
            font-weight: 500;
        }

        h6 {
            font-size: 1rem;
            /* 16px */
            font-weight: 500;
        }

        p {
            font-size: 1rem;
            /* 16px */
            font-weight: 400;
        }

        small {
            font-size: 0.875rem;
            /* 14px */
        }

        .btn {
            font-size: 1rem;
        }

        label,
        input,
        select,
        textarea {
            font-family: 'Tajawal', sans-serif !important;
            font-size: 1rem;
        }

        table {
            font-size: 0.95rem;
        }

        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }

        .form-outline .form-control:focus~.form-label {
            color: rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-middle {
            border-color: rgb(1, 161, 127);
            box-shadow: 0 1px 0 0 rgb(1, 161, 127);
            border-top: 1px solid rgba(0, 0, 0, 0);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-leading {
            border-color: rgb(1, 161, 127);
            box-shadow: -1px 0 0 0 rgb(1, 161, 127), 0 1px 0 0 rgb(1, 161, 127), 0 -1px 0 0 rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-trailing,
        .form-outline .form-control.active~.form-notch .form-notch-trailing {
            border-left: none;
        }

        .form-outline .form-control:focus~.form-notch .form-notch-trailing {
            border-color: rgb(1, 161, 127);
            box-shadow: 1px 0 0 0 rgb(1, 161, 127), 0 -1px 0 0 rgb(1, 161, 127), 0 1px 0 0 rgb(1, 161, 127);
        }
    </style>
    @livewireStyles()
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">

                <div class="d-flex justify-content-center align-items-center col-sm-6">
                    <div class="card-body p-md-5 mx-md-4">

                        <div class="text-center">
                            <img src="{{ asset('assets/web/images/logo.jpeg') }}" style="width: 210px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1 fw-bold">{{ $headerTitle }}</h4>
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $slot }}
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('assets/admin/images/login.jpg') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>


    {{-- JS Scripts --}}

    <script type="text/javascript" src="{{ asset('assets/admin/mdb-pro/js/core.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    @livewireScripts()

    @stack('admin-login-script')


</body>

</html>
