@extends('user.master')
@section('slider')
@include('user.blocks.slider')

@endsection 
@section('Content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="newProduct">
						@include('user.pages.newProduct')

					</div>
					
					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Top Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">
								@if(count($product) > 0)
								{{count($product)}} Product
								@endif
							</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($product as $key => $value)
							@if($key >=8)
							@break
							@else
							<div class="col-sm-3">
								<div class="single-item ">
									@if( $value["promotion_price"]!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('user/detailProduct',$value['id'])}}"><img height="250px" src="{!! asset('public/user/image/product/'.$value["image"]) !!} " alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{!! $value["name"] !!}</p>
										<p class="single-item-price">
											@if ( $value["promotion_price"]==0)
											<span>{!!$value["unit_price"] !!}	</span>
											@else
											<span>{!! $value["promotion_price"] !!}	</span>
											<strike>{!! $value["unit_price"] !!}</strike>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('user/detailProduct',$value['id'])}}">Details<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
										<div class="space40">&nbsp;</div>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
						

					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('script')
<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
	
	$(document).on('click','.pagination', function(e){
		alert("00");
		e.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		getPosts(page);
	});

	function getPosts(page)
	{
		$.ajax({
			type: "GET",
			url: '?page='+ page
		})
		.success(function(data) {
			$('body').html(data);
		});
	}

</script>


@endsection 