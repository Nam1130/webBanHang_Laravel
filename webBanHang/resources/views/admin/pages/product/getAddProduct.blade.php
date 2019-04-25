@extends('admin.master')

@section('headerPage')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		THÊM SẢN PHẨM
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">Blank page</li>
	</ol>
</section>
@endsection

<!-- content -->
@section('content')

<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">NHẬP SẢN PHẨM</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">


					<div class="card">
						<div class="card-body">

							<!-- 	thông báo -->
							@if ($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{ $message }}</strong>
							</div>
							@endif
							<!-- báo lỗi -->

							@if ($errors->any())
							<div class="alert alert-danger" style="margin: 20px;">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif

							<form action="{{ URL::action('ProductController@postAdd') }}" method="POST" role="form" style="margin: 20px; " enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
								<legend style="text-align: center;">Nhập Sản Phẩm</legend>
								<div class="form-group">

									<label for=""><b>Tên sản phẩm:</b> </label>
									<input type="text" class="form-control" name="name" id="" >

									<label for=""><b>Miêu tả:</b> </label>
									<input type="text" class="form-control" name="description" id="" >

									<label for=""> <b> Hình ảnh sản phẩm: </b> </label>
									<input type="file"  name="image">
									<br>
									<label for=""> <b> Danh mục sản phẩm: </b></label>
									<select class="form-control" name="id_type" id="id_type">

										<option value="">Mời bạn chọn:</option>
										@foreach($category as $cate)
										<option value="{!! $cate['id']!!}">-- {!! $cate['name'] !!}</option>
										@endforeach

									</select>

									<label for=""><b> Giá sản phẩm: </b></label>
									<input type="number" class="form-control" name="unit_price" id="" >

									<label for=""><b> Giá khuyến mãi: </b></label>
									<input type="number" class="form-control" name="promotion_price" id="" >

									<label for=""><b>Đơn vị: </b> </label>
									<input type="number" class="form-control" name="unit" id="" >

									<label for=""><b> Tình trạng sản phẩm: </b></label>
									<input type="number" class="form-control" name="new" id="" >

								</div>



								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					Footer
				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->

		</section>

		@endsection
