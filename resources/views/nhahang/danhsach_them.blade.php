@extends('nhahang.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<!-- /.container-fluid -->
	<div class="row">
         <div class="container">
         	<h2 style="text-align: center;color: orange;">Danh Sách Món Ăn Của Hệ Thống.</h2>
         	{{-- <div class="row"> --}}
         		{{-- <div class="form-group">
	         		<div class="">
	         			@foreach($monans as $monan)
						<div class="col-sm-4 col-xs-6 float-right">
		         			<input type="checkbox" name="choice" id="choice{{$monan->id}}">
		                    <label>{{$monan->ten_monan}}</label>
						</div>
		                @endforeach
	         		</div>
         		</div> --}}
         	{{-- </div> --}}
         </div>
	</div>
</div>
{{-- có thể sử dụng ajax để hiển thị lỗi --}}
<!-- /#page-wrapper -->
@endsection
