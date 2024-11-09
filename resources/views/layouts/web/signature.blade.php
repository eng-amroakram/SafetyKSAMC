<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قسم السلامة المهنية</title>

    <!-- MDB Core Styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/mdb.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/card.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/lightbox.css') }}">

    <!-- Logo Website -->
    <link rel="icon" type="image/png" href="{{ asset('assets/web/images/logo.jpeg') }}">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Link to Tajawal font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    @livewireStyles()
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />


    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }

        /* Styles for signature plugin v1.2.0. */
        .kbw-signature {
            display: inline-block;
            border: 1px solid #a0a0a0;
            -ms-touch-action: none;
        }

        .kbw-signature-disabled {
            opacity: 0.35;
        }
    </style>

    <style>
        /* Apply Tajawal font to the whole document */
        body {
            font-family: 'Tajawal', sans-serif;
            margin: 0;
            padding: 0;
            direction: rtl;
            /* For Arabic alignment */
            text-align: right;
        }

        /* Styling for headers */
        h1 {
            font-size: 2.5em;
            font-weight: 700;
        }

        h2 {
            font-size: 2em;
            font-weight: 700;
        }

        h3 {
            font-size: 1.75em;
            font-weight: 700;
        }

        h4 {
            font-size: 1.5em;
            font-weight: 700;
        }

        h5 {
            font-size: 1.25em;
            font-weight: 700;
        }

        h6 {
            font-size: 1em;
            font-weight: 700;
        }

        /* Styling for paragraphs, links, and list items */
        p,
        a,
        li {
            font-size: 1em;
            /* Adjust this size as needed */
            font-weight: 400;
        }

        .section-background {
            background: linear-gradient(155deg, #005fa1 5%, rgb(1, 161, 127) 87%);
            border-radius: 0.5rem;
        }

        .background-blue {
            background-color: #005fa1;
        }

        .background-green {
            background-color: rgb(1, 161, 127);
        }
    </style>

    <style>
        .form-control:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: rgb(1, 161, 127);
            -webkit-box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
            box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-label {
            color: rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-middle {
            border-bottom: 0.125rem solid;
            border-color: rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-leading {
            border-top: 0.125rem solid rgb(1, 161, 127);
            border-bottom: 0.125rem solid rgb(1, 161, 127);
            border-right: 0.125rem solid rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-trailing {
            border-top: 0.125rem solid rgb(1, 161, 127);
            border-bottom: 0.125rem solid rgb(1, 161, 127);
            border-left: 0.125rem solid rgb(1, 161, 127);
        }

        .input-group>.form-control:focus {
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
            border-color: rgb(1, 161, 127);
            outline: 0;
            -webkit-box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
            box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
        }
    </style>

    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: rgb(1, 161, 127);
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.1);
        }

        .nav-pills .nav-link {
            border-radius: 0.25rem;
            font-size: 14px;
            text-transform: uppercase;
            padding: 17px 29px 16px;
            line-height: 1;
            background-color: #f5f5f5;
            font-weight: 700;
            color: rgba(0, 0, 0, 0.6);
            margin: 0.5rem;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #005fa1;
            border-color: #005fa1;
        }

        .nav-tabs .nav-link {
            border: solid transparent;
            border-width: 0 0 2px;
            border-radius: 0;
            text-transform: uppercase;
            line-height: 1;
            font-weight: 700;
            font-size: 14px;
            color: rgba(0, 0, 0, 0.6);
            padding: 17px 29px 16px;
        }

        .table tbody td,
        .table thead th {
            vertical-align: middle;
            /* Centers content vertically */
            text-align: center;
            /* Centers content horizontally */
        }

        .fire-extinguishers tbody tr td:nth-child(2),
        .fire-extinguishers thead tr th:nth-child(2) {
            width: 150px;
            /* Adjust the width as needed */
        }

        .fire-extinguishers tbody tr td:nth-child(3),
        .fire-extinguishers thead tr th:nth-child(3) {
            width: 150px;
        }

        .nav-pills .nav-link-custom {
            border-radius: 0.25rem;
            font-size: 14px;
            text-transform: uppercase;
            padding: 17px 29px 16px;
            line-height: 1;
            background-color: #f87e7e;
            font-weight: 700;
            color: rgb(255, 255, 255);
            margin: 0.5rem;
        }
    </style>

</head>

<body>

    @include('partials.web.header')
    <main id="main-screen" class="container">
        {{ $slot }}
    </main>
    @include('partials.web.footer')

    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/web/js/signature.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts()
    @stack('scripts')

</body>

</html>
