<!doctype html>

<html class="no-js" lang="">
<head>
    <link rel="shortcut icon" href="icon_customer/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="900">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Ẩm thực quanh ta')</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="vendor_customer/assets/css/google_fonts.css"> 
    <link rel="stylesheet" href="vendor_customer/assets/css/skills/progressbar.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/skills/style.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/fonticons.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/bootstrap.min.css">
    <!--For Plugins external css-->
    <link rel="stylesheet" href="vendor_customer/assets/css/teamslide.css"/>
    <link rel="stylesheet" href="vendor_customer/assets/css/plugins.css"/>
    <!--Theme custom css -->
    <link rel="stylesheet" href="vendor_customer/assets/css/style.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/chitietmonan.css" >
    <link rel="stylesheet" type="text/css" href="vendor_customer/assets/css/modalHeader.css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="vendor_customer/assets/css/responsive.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="vendor_customer/vendor/css/mycss.css"> -->
    <script src="vendor_customer/assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="vendor_customer/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body data-spy="scroll" data-target="#main_menu" data-offset="160">

@include("customer.layouts.header")

<section id="content" class="content container-fluid">
 @if (session('thongbao'))
    <script>
        {{--       {{session('thongbao')}}--}}
    </script>
    @endif
    @if (session('thongbaoloi'))
    <script>
        {{--       {{session('thongbaoloi')}}--}}
    </script>
    @endif
    @if(count($errors) > 0)
        @foreach ($errors->all() as $err)
        <script>
            alert("{{$err}}");
        </script>
         @endforeach
     @endif
@yield('content')
@include('customer.layouts.couter')
@include('customer.layouts.contact')
</section>
<hr class="alert-warning" style="border: 5px;">
<!-- START SCROLL TO TOP  -->
<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>
{{-- Thư viện sử dụng --}}
<script src="vendor_customer/assets/js/vendor/bootstrap.min.js"></script>
<script src="vendor_customer/assets/js/jquery.easypiechart.min.js"></script>
<script src="vendor_customer/assets/js/jquery.mixitup.min.js"></script>
<script src="vendor_customer/assets/js/jquery.easing.1.3.js"></script>
<script src="vendor_customer/assets/css/skills/inview.min.js"></script>
<script src="vendor_customer/assets/css/skills/progressbar.js"></script>
<script src="vendor_customer/assets/css/skills/main.js"></script>
<script src="vendor_customer/assets/js/modalHeader.js"></script>
<script src="vendor_customer/assets/js/plugins.js"></script>
<script src="vendor_customer/assets/js/main.js"></script>

@yield('script')
</body>
</html>
