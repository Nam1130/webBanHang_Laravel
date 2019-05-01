<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href=" {{ asset('public/user/assets/dest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href=" {{ asset('public/user/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
	<link rel="stylesheet" href=" {{ asset('public/user/assets/dest/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href=" {{ asset('public/user/assets/dest/rs-plugin/css/responsive.css') }}">
	<link rel="stylesheet" title="style" href=" {{ asset('public/user/assets/dest/css/style.css') }}">
	<link rel="stylesheet" href=" {{ asset('public/user/assets/dest/css/animate.css') }}">
	<link rel="stylesheet" title="style" href=" {{ asset('public/user/assets/dest/css/huong-style.css') }}">
</head>
<body>

	@include('user.blocks.header')
	@yield('slider')

	@yield('Content')
	
	@include('user.blocks.footer')


	<!-- include js files -->
	<!-- <script src="{{ asset('public/user/assets/dest/js/scripts.min.js') }}"></script> -->
	<script src=" {{ asset('public/user/assets/dest/js/jquery.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/animo/Animo.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/dug/dug.js') }}"></script>
	
	<script src="{{ asset('public/user/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/js/wow.min.js') }}"></script>
	<!--customjs-->
	<script src="{{ asset('public/user/assets/dest/js/custom2.js') }}"></script>
	<script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}}
				)
		});

		
		// $(document).ready(function() {    
		// 	alert("message?: DOMString111");

		// });

		function show_cart()  
		{  
			$.ajax({  
				url:"{{ route('cart/show_cart') }} ",  
				method:"GET",  
				success:function(data){  
					//alert("ok");
					console.log(data);
					$('#showCart').html(data);  

				}  
			});  
		} 

		function succes($title) {
			Swal.fire({
				
				type: 'success',
				title: $title,
				showConfirmButton: false,
				timer: 1500
			})
		}

		function error($title) {
			Swal.fire({
				
				type: 'error',
				title: $title,
				showConfirmButton: false,
				timer: 2000
			})
		}

		function btnAddCart(id) {
			//alert(id)
			var product_id = id;

			$.ajax({
				type: "GET",
				url: '<?php echo url('user/addToCart');?>/'+product_id,
				success: function (data) {
					console.log(data);
					succes('Đã Thêm Vào Giỏ Hàng!');
					show_cart();


				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
			
		};

		//delete cart item
		function btnDelCart(id) {
			//alert(id)
			var product_id = id;

			$.ajax({
				type: "GET",
				url: '<?php echo url('user/deleteItemCart');?>/'+product_id,
				success: function (data) {
					console.log(data);
					show_cart();

				},
				error: function (data) {
					console.log('Error:', data);
				}
			});

		};
		
		function updateCart(id) {
			var proId = id;
			var newqty = document.getElementById("quantity").value;
			if(newqty <=0){ error("Số lượng phải lớn hơn 0!") }
				else {

					$.ajax({
						type: "GET",
						url: '<?php echo url('cart/updateCart');?>/'+proId,
						data: "qty=" + newqty + "& proId=" + proId,
						success: function (data) {
							console.log(data);
							$('#tableCart').html(data);
						},
						error: function (data) {
							console.log('Error:', data);
						}
					});
				}


			};

		</script>
	</body>
	</html>
