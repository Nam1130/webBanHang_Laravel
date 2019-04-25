 @extends('admin.master')

 @section('headerPage')

 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1>
 		CHỈNH SỬA SẢN PHẨM
 		
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
 			<h3 class="box-title">NHẬP THÔNG TIN SẢN PHẨM</h3>

 			<div class="box-tools pull-right">
 				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
 					<i class="fa fa-minus"></i></button>
 					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
 						<i class="fa fa-times"></i></button>
 					</div>
 				</div>
 				<div class="box-body">
 					<div >
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
 								<form action="{{ URL::action('ProductController@postEditProduct',$product->id) }}" method="POST" role="form" style="margin: 20px;" enctype="multipart/form-data">
 									<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
 									<legend style="text-align: center;">Nhập Danh Mục</legend>
 									<div class="form-group">

 										<label for=""><b>Tên sản phẩm:</b> </label>
 										<input type="text" class="form-control" name="name" id="" value="{!! old ('name',isset($product)?$product['name']:NULL) !!}">

 										<label for=""><b>Chi tiết sản phẩm:</b> </label>
 										<input type="text" class="form-control" name="description" id="" value="{!! old ('description',isset($product)?$product['description']:NULL) !!}">


 										<label for="image">Hình ảnh:</label>
 										<input type="file" name="image" value="{!! isset($product)?$product['image']:NULL !!}">
 										<img src="{!! asset('public/user/image/product/'.$product['image']) !!}" width="100">
 										<br>
 										<label for="price">Giá:</label>
 										<input onkeypress='return event.charCode >= 48 && event.charCode <=57' type="number" class="form-control" name="unit_price" value="{!! old ('unit_price',isset($product)?$product['unit_price']:NULL) !!}">

 										<label for="price">Giá khuyến mãi:</label>
 										<input onkeypress='return event.charCode >= 48 && event.charCode <=57' type="number" class="form-control" name="promotion_price" value="{!! old ('promotion_price',isset($product)?$product['promotion_price']:NULL) !!}">

 										<label for="quantity">Đơn vị:</label>
 										<input onkeypress='return event.charCode >= 48 && event.charCode <=57' type="number" class="form-control" name="unit" value="{!! old ('unit',isset($product)?$product['unit']:NULL) !!}">


 										<label for="">Danh mục:</label>
 										<select class="form-control" name="id_type" id="id_type">

 											<!-- $cate trong hàm getEdit của file ProductsController -->
 											@foreach($category as $cat)
 											<option value="{!! $cat['id'] !!}" {!! $cat['id'] == $product['id_type']?'selected' : '' !!}>-- {!! $cat['name'] !!}</option>
 											@endforeach
 										</select>

 										<label for=""><b> Tình trạng sản phẩm: </b></label>
 										<input type="numer" class="form-control" name="unit" id="" value="{!! old ('unit',isset($product)?$product['unit']:NULL) !!}">

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
