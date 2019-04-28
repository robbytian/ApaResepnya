<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Fontfaces CSS-->
    <link href="{{asset('assets')}}/css/font-face.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" >

    <!-- Bootstrap CSS-->
    <link href="{{asset('assets')}}/vendor/bootstrap-4.1/css/bootstrap.css" rel="stylesheet" >

    <!-- Vendor CSS-->
    <link href="{{asset('assets')}}/vendor/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/animsition/animsition.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/select2/select2.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" >
    
    <!-- Main CSS-->
    <link href="{{asset('assets')}}/css/theme.css" rel="stylesheet" >
    <link href="{{asset('assets')}}/css/bundle.css" rel="stylesheet" >
    
    {{-- Icon --}}
    <link rel="shortcut icon" href="{{asset('assets')}}/images/icon/favicon.png" type="image/x-icon">
    
    {{-- <link href="{{asset('assets')}}/vendor/wow/animate.css" rel="stylesheet" > --}}
    {{-- <link href="{{asset('assets')}}/vendor/slick/slick.css" rel="stylesheet" > --}}
    {{-- <link href="{{asset('assets')}}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" > --}}
    @yield('styles')
</head>
<body class="">

<div class="page-wrapper">
    @include('template.user_header')
    <div class="page-content--bgf7">
    <br><br>
        @yield('contents')
        @yield('modals')
    </div>
</div>

<!-- Jquery JS-->
<script src="{{asset('assets')}}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{asset('assets')}}/vendor/bootstrap-4.1/js/bootstrap.js"></script>
<!-- Vendor JS       -->
<script src="{{asset('assets')}}/vendor/select2/select2.min.js"></script>
<script src="{{asset('assets')}}/vendor/animsition/animsition.min.js"></script>
<script src="{{asset('assets')}}/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="{{asset('assets')}}/vendor/ckeditor/ckeditor.js"></script>
<script src="{{asset('assets')}}/vendor/select2/select2.min.js"></script>
<script src="{{asset('assets')}}/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>


<!-- Main JS-->
<script src="{{asset('assets')}}/js/main.js"></script>
<script src="{{asset('assets')}}/js/bundle.js"></script>

{{-- <script src="{{asset('assets')}}/vendor/wow/wow.min.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/slick/slick.min.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/counter-up/jquery.waypoints.min.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/counter-up/jquery.counterup.min.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/circle-progress/circle-progress.min.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script> --}}
{{-- <script src="{{asset('assets')}}/vendor/chartjs/Chart.bundle.min.js"></script> --}}

@yield('scripts')

</body>
</html>