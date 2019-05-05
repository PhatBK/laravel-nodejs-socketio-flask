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
                            <a href="trangchu"><i class="fa fa-dashboard fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trở Về Trang Chủ</a>
                        </li>
                        <li>
                            <a href="{{route('danhSachMonAn')}}"><i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;Món Ăn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danhSachMonAn')}}">Danh Sách Các Món Ăn</a>
                                </li>
                                <li>
                                    <a href="{{route('themMonAn')}}">Thêm Món Ăn</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/nhahang/danhsach"><i class="fa fa-home"></i>&nbsp;Nguyên Liệu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/nguyenlieu/danhsach">Danh Sách Nguyên Liệu</a>
                                </li>
                                <li>
                                    <a href="admin/nguyenlieu/them">Thêm Nguyên Liệu</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/nhahang/danhsach"><i class="fa fa-home"></i>&nbsp;Bữa Ăn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/buaan/danhsach">Danh Sách Các Bưa Ăn</a>
                                </li>
                                <li>
                                    <a href="admin/buaan/them">Thêm Bữa Ăn Mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('danhSachTheLoai')}}"><i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;Thể Loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danhSachTheLoai')}}">Danh Sach Các Thể Loại</a>
                                </li>
                                <li>
                                    <a href="{{route('themTheLoai')}}">Thêm Thể Loại</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('danhSachLoaiMon')}}"><i class="fa fa-cube fa-fw"></i>&nbsp;Loại Món<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danhSachLoaiMon')}}">Danh Sách Các Loại Món</a>
                                </li>
                                <li>
                                    <a href="{{route('themLoaiMon')}}">Thêm Loại Món</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="{{route('danhSachCongDung')}}"><i class="fa fa-bars"></i>&nbsp;Công Dụng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danhSachCongDung')}}">Danh Sách Các Công Dụng</a>
                                </li>
                                <li>
                                    <a href="{{route('themCongDung')}}">Thêm Công Dụng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('danhSachMucDich')}}"><i class="fa fa-adjust"></i>&nbsp;Mục Đích<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danhSachMucDich')}}">Danh Sách Các Mục Đích</a>
                                </li>
                                <li>
                                    <a href="{{route('themMucDich')}}">Thêm Mục Đích</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('danhSachVungMien')}}"><i class="glyphicon glyphicon-globe"></i>&nbsp;Vùng Miền<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danhSachVungMien')}}">Danh Sách Các Vùng Miền</a>
                                </li>
                                <li>
                                    <a href="{{route('themVungMien')}}">Thêm Vùng Miền</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/nhahang/danhsach"><i class="fa fa-home"></i>&nbsp;Nhà Hàng Liên Kết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/nhahang/danhsach">Danh Sach Nhà Hàng Liên Kết</a>
                                </li>
                                <li>
                                    <a href="admin/nhahang/them">Thêm Nhà Nhà Hàng Liên Kết</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/info"><i class="fa fa-users fa-fw"></i>&nbsp;Tài Khoản Người Dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/danhsach">Danh Sách Tài Khoản Người Dùng</a>
                                </li>
                                <li>
                                    <a href="admin/user/them">Thêm Tài Khoản Người Dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-comment-o"></i>&nbsp;Bài Viết Của Thành Viên <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/baiviet/danhsach">Danh Sách Bài Viết</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="admin/thongke/lichsu"><i class="fa fa-bar-chart"></i>&nbsp;Thống Kê <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="admin/thongke/thuchientk">Thống Kê</a></li>
                                <li><a href="admin/thongke/lichsu">Lịch Sử Thống Kê</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
</div>