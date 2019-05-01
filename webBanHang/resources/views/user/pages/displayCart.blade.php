@extends('user.master')

@section('Content')
<div class="container">
	<div id="content">

		
		
		<div class="inner-header">
			<div class="container">
				<div class="pull-left">
					<h6 class="inner-title">Shopping Cart</h6>
				</div>
				<div class="pull-right">
					<div class="beta-breadcrumb font-large">
						<a href="index.html">Home</a> / <span>Shopping Cart</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div id="tableCart" class="container">
			@include('user.pages.ajax.tableCart')
		</div> <!-- .container -->

	
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection

