 @extends('admin.master')

 @section('headerPage')

 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1>
 		THÊM DANH MỤC
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
 			<h3 class="box-title">DANH MỤC</h3>

 			<div class="box-tools pull-right">
 				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
 					<i class="fa fa-minus"></i></button>
 					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
 						<i class="fa fa-times"></i></button>
 					</div>
 				</div>
 				<div class="box-body">
 					<div>
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
 						<div class="card">
 							<div class="card-body">
 								<form action="{{ URL::action('TypeproductController@postAdd') }}" method="POST" role="form" style="margin: 20px;" enctype="multipart/form-data">
 									<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
 									<legend style="text-align: center;">Nhập Danh Mục</legend>
 									<div class="form-group">

 										<label for=""><b>Tên danh mục:</b> </label>
 										<input type="text" class="form-control" name="name" id="" >

 										<label for=""> <b> Miêu tả: </b> </label>
 										<input type="text" class="form-control" name="description" id="" >

 										<label for=""> <b> Hình ảnh sản phẩm: </b> </label>
 										<input type="file"  name="image">
 										<br>


 									</div>



 									<button style="margin-left: 40%;" type="submit" class="btn btn-primary">Submit</button>
 								</form>

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
