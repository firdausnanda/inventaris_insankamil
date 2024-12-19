<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon/favicon.ico') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    <title>Inventory Management System</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />

    {{-- Datatable --}}
    <link rel="stylesheet" href="{{ asset('libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="{{ asset('libs/flatpickr/dist/flatpickr.min.css') }}" />

    {{-- Sweetalert --}}
    <link rel="stylesheet" href="{{ asset('libs/sweetalert2/dist/sweetalert2.min.css') }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('images/favicon/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">

        @include('layouts.sidebar_start')

        <!--  Sidebar End -->
        <div class="page-wrapper">

            @include('layouts.sidebar_with_horizontal')

            <div class="body-wrapper">
                @yield('content')
            </div>

            <!-- Color Theme -->
            <script>
                function handleColorTheme(e) {
                    document.documentElement.setAttribute("data-color-theme", e);
                }
            </script>

            @include('layouts.button_customizer')
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/theme/app.init.js') }}"></script>
    <script src="{{ asset('js/theme/theme.js') }}"></script>
    <script src="{{ asset('js/theme/app.min.js') }}"></script>
    <script src="{{ asset('js/theme/sidebarmenu.js') }}"></script>

    {{-- CSRF Token --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    
    {{-- Datatable --}}
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/datatable-basic.init.js') }}"></script>

    {{-- Flatpickr --}}
    <script src="{{ asset('libs/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('libs/flatpickr/dist/id.js') }}"></script>

    {{-- Sweetalert --}}
    <script src="{{ asset('libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    {{-- Moment --}}
    <script src="{{ asset('libs/momentjs/moment.min.js') }}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/dashboards/dashboard.js') }}"></script>
    @yield('script')
</body>

</html>
