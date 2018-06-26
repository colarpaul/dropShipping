@extends('layouts.layout')

@section('content')
<div class="categories-menu">
	<span>Top categories</span>
	<div class="col-xs-3 col-md-3 col-md-offset-1">
		<a href="{{ route('categoriesPage', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], 'Phone & Accessories'))) }}">
			<div class="image"><img src="{{ asset('images/phone.png') }}"></div>
			<div class="title">Phone & Accessories</div>
		</a>
	</div>
	<div class="col-xs-3 col-md-3">
		<a href="{{ route('categoriesPage', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], 'Computer & Office'))) }}">
			<div class="image"><img src="{{ asset('images/laptop.png') }}"></div>
			<div class="title">Computer & Office</div>
		</a>
	</div>
	<div class="col-xs-3 col-md-3">
		<a href="{{ route('categoriesPage', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], 'Jewelry & Watches'))) }}">
			<div class="image"><img src="{{ asset('images/jewelry.png') }}"></div>
			<div class="title">Jewelry & Watches</div>
		</a>
	</div>
	<div class="col-xs-3 col-md-2">
		<a href="{{ route('categoriesPage', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], 'Toys'))) }}">
			<div class="image"><img src="{{ asset('images/toys.png') }}"></div>
			<div class="title">Toys</div>
		</a>
	</div>
</div>

<div class="phone-accessories-title">{{ $category }}</div>
<div class="phone-accessories">
	@foreach($products as $product)
	<div class="product categories-product-pro col-xs-12 col-md-3">
		<div class="image">
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><img src="{{ asset('images/products/'.$product->images[0]) }}"></a>
		</div>
		<div class="description"><a href="{{ route('viewProduct', array(str_replace([' ', '/'], ['-', '-'], $product->name), $product->id)) }}">{{ $product->name }}</a></div>
		<div class="product-status">Available</div>
		<div>
			@if($product->flash_deal == 1)
			<div class="product-flash-deal-real-price">
				<span class="first">€{{ $product->price }}</span>
				<span class="last">(-{{ $product->deal_price }}%)</span>
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			<div class="add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}" data-image="{{ $product->images[0] }}"><span class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></span> <span class="add-to-cart-span">ADD TO CART</span></div>
			@else
			<div class="product-flash-deal-real-price">
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price, 2) }}</div>
			<div class="add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ number_format($product->price, 2) }}" data-image="{{ $product->images[0] }}"><span class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></span> <span class="add-to-cart-span">ADD TO CART</span></div>
			@endif
		</div>
	</div>	
	@endforeach
<div class="col-xs-12 col-md-12" id="pagination">{{ $products->links() }}</div>
</div>
@endsection

@section('footer')
@endsection
