<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('panel/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/plugins/colorbox/colorbox.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route("saler.logout")}}" class="nav-link">Çıkış Yap</a>
                </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('admin.masterpages.sidebar')
    </aside>

    <div class="content-wrapper @yield('content-class')">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-3"></div>
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>

                </div>
            </div>
        </section>

        @yield('content')
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="{{ asset('panel/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('panel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('panel/plugins/colorbox/jquery.colorbox.min.js') }}"></script>

<script src="{{ asset('panel/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('panel/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('panel/js/adminlte.min.js') }}"></script>
<script src="{{ asset('panel/js/demo.js') }}"></script>
<script src="{{ asset('panel/js/custom.js') }}"></script>

@yield('custom_js')

</body>

</html>
