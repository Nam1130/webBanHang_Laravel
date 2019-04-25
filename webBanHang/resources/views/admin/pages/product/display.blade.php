@extends('admin.master')

@section('headerPage')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		DANH SÁCH SẢN PHẨM
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
			<h3 class="box-title">SẢN PHẨM</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div style="margin-top: 20px;">
						<div class="card">
							<!-- 	thông báo -->
							@if ($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{ $message }}</strong>
							</div>
							@endif


							<div class="card-header" style="text-align: center;"><b>Danh sách Sản Phẩm</b></div>
							<div class="card-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>ID</th>
											<th width="30%">Tên sản phẩm</th>
											<th>new</th>
											<th>Hình ảnh</th>
											<th width="15%">Danh mục</th>
											<th>Miêu tả</th>
											<th width="10%">Giá</th>
											<th width="20%">Giá Khuyến mãi</th>
											<th width="100%">Tùy chỉnh</th>
										</tr>
									</thead>
									<tbody>
										@foreach($product as $value)
										<tr>
											<td>{!! $value["id"] !!}</td>
											<td>{!! $value["name"] !!}</td>
											<td>{!! $value["new"] !!}</td>
											<td>
												<img width="100" src="{!! asset('public/user/image/product/'.$value["image"]) !!} "alt="{!! $value["name"] !!}">
											</td>

											<td>
												{!! $value['id_type'] !!}
											</td>

											<td>{!! $value["description"] !!}</td>
											<td>
												{!! $value['unit_price'] !!}
											</td>
											<td>
												{!! $value['promotion_price'] !!}
											</td>

											<td>
												<a href="{!! url('admin/product/getAdd') !!}"><i class="fa fa-plus-circle"></i>Thêm</a>
												<a href="{!! url('admin/product/editProduct',$value["id"]) !!}"><i class="fa fa-pencil"></i>Sửa</a>
												<a href="{!! url('admin/product/deleteProduct',$value["id"]) !!}"><i class="fa fa-trash"></i>Xóa</a>




											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
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
