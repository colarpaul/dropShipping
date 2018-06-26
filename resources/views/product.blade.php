@extends('layouts.layout')

@section('content')
<div class="product-container">
	<div class="routes col-xs-12 col-md-12"> <a href="{{ route('categoriesPage', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->category))) }}">{{ $product->category }}</a> <span>/</span> <a href="{{ route('subcategoriesPage', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->subcategory))) }}">{{ $product->subcategory }}</a> <span>/</span> <a href="{{ route('searchProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->best_tag))) }}">{{ $product->best_tag }}</a> </div>
	<div class="title col-xs-12 col-md-12">{{ $product->name }}</div>
	<div class="product-details col-md-12">
		<div class="product-image-details col-xs-12 col-md-4">
			<div class="slider-for">
				@foreach($product->images as $image)
				<div data-index="1"><img src="/images/products/{{ $image }}"></div>
				@endforeach
			</div>
			<div class="slider-nav">
				@foreach($product->images as $image)
				<div><img src="/images/products/{{ $image }}"></div>
				@endforeach
			</div>
		</div>
		<div class="product-description-details col-xs-12 col-md-5">
			{!! nl2br($product->description) !!}
			<br>	
			<div><b style="color: red">Shipment</b></div>
			<div>Estimated Delivery Time: {{ $product->shipment_time }} days</div>
		</div>
		<div class="product-price-details col-xs-12 col-md-3">
			@if($product->flash_deal == 1)
			<div class="deal-price"><span class="old-price">€{{ $product->price }}</span> <span class="deal">(-{{ $product->deal_price }}%)</span></div>
			<br>
			<div><b style="color: red">Return policy</b></div>
			<div>Returns accepted if product not as described, buyer pays return shipping fee; or keep the product & agree refund with seller.</div>
			<br>
			<div><b style="color: red">Seller Guarantees:</b></div>
			<div>On time delivery: <b>60 days</b> <br>(Full refund if product isn't received in 60 days)</div>
			<br>
			<div class="price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			<div class="status">Available</div>
			<div class="buy-now-button-animation"><div class="buy-now-button" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}" data-image="{{ $product->images[0] }}"><span class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></span>ADD TO CART</div></div>
			@else
			<br>
			<div><b style="color: red">Return policy</b></div>
			<div>Returns accepted if product not as described, buyer pays return shipping fee; or keep the product & agree refund with seller.</div>
			<br>
			<div><b style="color: red">Seller Guarantees:</b></div>
			<div>On time delivery: <b>60 days</b> <br>(Full refund if product isn't received in 60 days)</div>
			<br>
			<div class="price">€{{ $product->price }}</div>
			<div class="status">Available</div>
			<a href="#"><div class="buy-now-button" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ number_format($product->price, 2) }}" data-image="{{ $product->images[0] }}"><span class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></span>ADD TO CART</div></a>
			@endif
		</div>
	</div>
</div>
@endsection


@section('footer')
<script>
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		focusOnSelect: true,
		arrows: false,
	});
</script>
@endsection