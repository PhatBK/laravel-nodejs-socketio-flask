<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web site ẩm thực quanh ta">
    <meta name="description" content="Lậ trình Laravel Framework 5.5">
    <meta name="Team Bk-food" content="Lập trình web site với Laravel framework">
    <meta name="Nhà Hàng" content="Trang dành cho nhà hàng">

    <title>Ẩm Thực Quanh Ta</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="vendor_admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor_admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="vendor_admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor_admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="vendor_admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="vendor_admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer>
        {lang: 'vi'}
    </script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('nhahang.header')
        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor_admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor_admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="vendor_admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor_admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendor_admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="vendor_admin/ckeditor/ckeditor.js" ></script>
    @yield('script')
</body>
@include('admin.layouts.footer')
</html>
