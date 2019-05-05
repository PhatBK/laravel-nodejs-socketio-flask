 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <div class="alert-warning">
                <a class="navbar-brand" href="{{ route('nhahang.thongtin') }}">Trang Dành Cho Nhà Hàng Liên Kết</a>
        </div>
    </div>
    <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="sidebar-search">
                                    <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </li>
                                <li class="alert-info">
                                    <a href="{{ route('nhahang.logout') }}"><i class="fa fa-dashboard fa-fw"></i><u>Đăng Xuất</u></a>
                                </li>
                                <li class="alert-info">
                                    <a href="trangchu"><i class="fa fa-dashboard fa-fw"></i><u>Trở Về Trang Chủ</u></a>
                                </li>
                                <li class="alert-info">
                                    <a href="{{ route('nhahang.thongtin') }}"><i class="fa fa-dashboard fa-fw"></i>Thông Tin:<b style="color: red;">{{ Auth::guard('nhahang')->user()->username}}</b></a>
                                </li>
                                <li class="alert-info">
                                    <a href="{{ route('nhahang.danhsachmonan') }}"><i class="fa fa-bar-chart-o fa-fw"></i><u>Danh Sách Món Ăn</u></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-cube fa-fw"></i><u>Thêm Món Ăn</u><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{ route('nhahang.tuthemmonan') }}">Thêm Mới Món Ăn</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('nhahang.themmonantudanhsach') }}">Thêm Món Ăn Từ Danh Sách</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>

                            </ul>
                </div>  <!-- /.sidebar-collapse -->
        </div>
</nav>