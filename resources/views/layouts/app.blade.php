{{-- <!DOCTYPE html> --}}
{{-- <html lang="en"> --}}
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Ventura - Dashboard</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/back/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/back/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/back/css/font-awesome.min.css') }}">

		<!-- Feathericon CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('assets/back/css/feathericon.min.css') }}"> --}}

		{{-- <link rel="stylesheet" href="{{ asset('assets/back/plugins/morris/morris.css') }}"> --}}

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/back/css/style.css') }}">

        <!-- Toastr JS -->
        <link rel="stylesheet" href="{{ asset('assets/back/css/toastr.min.css') }}">

        @yield('css')
    <style>
        .subdrop {
            font-weight: bold !important;
        }
        /* .form-check-input {
            cursor: pointer
        } */
        input[type=checkbox], input[type=radio] {
            cursor: pointer
        }
    </style>
    </head>
    <body class="mini-sidebars">

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            @include('layouts.header')

			<!-- Sidebar -->
            @include('layouts.menu')

			<!-- Page Wrapper -->
            <div class="page-wrapper">

                <div class="content container-fluid">
                    @yield('content')
                </div>
			</div>
        </div>

		<!-- jQuery -->
        <script src="{{ asset('assets/back/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        {{-- <script src="{{ asset('assets/back/js/popper.min.js') }}"></script> --}}
        <script src="{{ asset('assets/back/js/bootstrap.min.js') }}"></script>

		<!-- Slimscroll JS -->
        {{-- <script src="{{ asset('assets/back/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script> --}}

		<!-- Custom JS -->
        <script  src="{{ asset('assets/back/js/script.js') }}"></script>

        <!-- Toastr JS -->
        <script src="{{ asset('assets/back/js/toastr.min.js') }}"></script>
        {!! Toastr::message() !!}

        <!-- Excel bootstrap table filter JS -->
        {{-- <script src="{{ asset('assets/back/js/excel-bootstrap-table-filter-bundle.min.js') }}"></script> --}}


        @yield('script')

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });

            $('.item-nav').click(function(e) {
                e.preventDefault();
                console.log('link:' + $(this).attr('href'))

                $('.contenu').load( $(this).attr('href'))
            });
        </script>

    </body>
</html>
