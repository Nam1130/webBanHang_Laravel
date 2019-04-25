<!doctype html>
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
	<script src=" {{ asset('public/user/assets/dest/js/jquery.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/animo/Animo.js') }}') }}"></script>
	<script src="{{ asset('public/user/assets/dest/vendors/dug/dug.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/js/scripts.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('public/user/assets/dest/js/wow.min.js') }}"></script>
	<!--customjs-->
	<script src="{{ asset('public/user/assets/dest/js/custom2.js') }}"></script>
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}}
				)
		})

		$(document).ready(function() {    
			alert("message?: DOMString11111111111111");
			
			$(document).on('click','.pagination a', function(event){
				alert("sdfsdfsdf");
				event.preventDefault();
				var page = $(this).attr('href').split('page=')[1];
				getPosts(page);
				alert($(this).attr('href'));
			});

			

			function getPosts(page)
			{
				$.ajax({
					type: "GET",
					url: "/pagination/fetch_newProduct?page="+ page,
					success:function(data){  
						$('#newProduct').html(data);  
					}  
				});

			};
		});
	</script>
</body>
</html>
