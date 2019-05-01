@if(Session::has('cart'))						
<div class="cart">					
	<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trong @endif) <i class="fa fa-chevron-down"></i></div>				
	<div class="beta-dropdown cart-body">
		@foreach($product_cart as $product)			
		<div class="cart-item" id="cart-item{{$product['item']['id']}}">			
		
			<a  type="button" onclick="btnDelCart({!!$product['item']['id'] !!})" class="cart-item-delete" value="{{$product['item']['id']}}" soluong="{{$product['qty']}}"><i class="fa fa-times"></i></a>		


			<div class="media">		
				<a class="pull-left" href="#"><img  src="{!! asset('public/user/image/product/'.$product['item']['image']) !!} "  alt=""></a>	

				<div class="media-body">	
					<span class="cart-item-title">{{$product['item']['name']}}</span>
					<span class="cart-item-amount">Số lượng: {{$product['qty']}}<span> <br>
					Giá: {{$product['item']['unit_price']}}</span></span>
				</div>	
			</div>		
		</div>			
		@endforeach			

		<div class="cart-caption">			
			<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đồng</span></div>		
			<div class="clearfix"></div>		

			<div class="center">		
				<div class="space10">&nbsp;</div>	
				<a href="{{route('cart/displayCart')}}" class="beta-btn primary text-center">Xem giỏ hàng <i class="fa fa-shopping-cart"></i></a>	
				<a href="{{route('user/checkOut')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>	

			</div>		
		</div>			
	</div>				
</div> 
@endif
<script src="{{ asset('public/user/assets/dest/js/scripts.min.js') }}"></script>

