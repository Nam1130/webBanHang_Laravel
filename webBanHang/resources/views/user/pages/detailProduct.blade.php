@extends('user.master')
@section('Content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Product</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="index.html">Home</a> / <span>Product</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						<img src="{!! asset('public/user/image/product/'.$product["image"]) !!}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"style="font-size: 20px">{{$product->name}} </p>
							<p class="single-item-price">
								@if ( $product["promotion_price"]==0)
								<span style="color: red;">{!!$product["unit_price"] !!}	</span>
								@else
								<span style="color: red;">{!! $product["promotion_price"] !!}	</span>
								<strike>{!! $product["unit_price"] !!}</strike>
								@endif
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{$product->description}}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<p>Options:</p>
						<div class="single-item-options">
							<select class="wc-select" name="size">
								<option>Size</option>
								<option value="XS">XS</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
							</select>
							<select class="wc-select" name="color">
								<option>Color</option>
								<option value="Red">Red</option>
								<option value="Green">Green</option>
								<option value="Yellow">Yellow</option>
								<option value="Black">Black</option>
								<option value="White">White</option>
							</select>
							<select class="wc-select" name="color">
								<option>Qty</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Description</a></li>
						<li><a href="#tab-reviews">Reviews (0)</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>	<p> {{$product->description}}</p></p>
						
					</div>
					<div class="panel" id="tab-reviews">
						<p>No Reviews</p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Related Products</h4>

					<div class="row">
						@foreach($RelatedProducts as $key => $value)

						<div class="col-sm-4">
							<div class="single-item">
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
									<a class="beta-btn primary" href="product.html">Details<i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
									<div class="space40">&nbsp;</div>
								</div>
							</div>
						</div>
						

						@endforeach
						
					</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Promotion Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($PromotionProduct as $value)
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="{!! asset('public/user/image/product/'.$value["image"]) !!} " alt=""></a>
								<div class="media-body">
									{!! $value["name"] !!}
									<span style="font-size: 16px;" class="beta-sales-price">
										<br>
										$
										@if ( $value["promotion_price"]==0)
										<span>{!!$value["unit_price"] !!}	</span>
										@else
										<span>{!! $value["promotion_price"] !!}	</span>
										<strike>{!! $value["unit_price"] !!}</strike>
										@endif

									</span>
								</div>
							</div>
							@endforeach
							
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($newProduct as $value)
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="{!! asset('public/user/image/product/'.$value["image"]) !!} " alt=""></a>
								<div class="media-body">
									{!! $value["name"] !!}
									<span style="font-size: 16px;" class="beta-sales-price">
										<br>
										$
										@if ( $value["promotion_price"]==0)
										<span>{!!$value["unit_price"] !!}	</span>
										@else
										<span>{!! $value["promotion_price"] !!}	</span>
										<strike>{!! $value["unit_price"] !!}</strike>
										@endif

									</span>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->


@endsection