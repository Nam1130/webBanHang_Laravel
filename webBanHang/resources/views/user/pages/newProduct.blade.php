<div class="beta-products-list">
	<h4>New Products</h4>
	<div class="beta-products-details">
		<p class="pull-left">
			@if(count($newProduct) > 0)
			{{count($newProduct)}} New Product
			@endif

		</p>
		<div class="clearfix"></div>
	</div>

	<div class="row">
		
		@foreach($newProduct as $key => $value)
		@if($key >= 4)
		@break
		@else
		<div class="col-sm-3">
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
					<input class="add-to-cart pull-left fa fa-shopping-cart"  type="button"  onclick="btnAddCart({!! $value["id"] !!})">
					<!-- <a class="add-to-cart pull-left" href="{{route('user/addToCart',$value["id"])}}"><i class="fa fa-shopping-cart" data-id="{{$value->id}}"></i></a> -->
					<a class="beta-btn primary" href="{{route('user/detailProduct',$value['id'])}}">Details<i class="fa fa-chevron-right"></i></a>
					<div class="clearfix"></div>
					<div class="space40">&nbsp;</div>
				</div>
			</div>
		</div>
		@endif
		
		
		@endforeach

		<ul class="pagination pagination-sm pull-right">
			{!! $newProduct->links() !!}
		</ul>
		
	</div>
					</div> <!-- .beta-products-list -->