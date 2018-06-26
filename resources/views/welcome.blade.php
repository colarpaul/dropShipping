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
<div class="flash-deals-title">Flash Deals</div>
<div class="flash-deals">
	@foreach($flashDealProducts as $product)
	<div class="product">
		<div class="image">
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">
				<img src="{{ asset('images/products/'.$product->images[0]) }}">
			</a>
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="show-product-button">VIEW PRODUCT</div></a>
		</div>
		<div class="description"><a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">{{ $product->name }}</a></div>
		<div class="product-status">Available</div>
		<div>
			@if($product->flash_deal == 1)
			<div class="product-flash-deal-real-price">
				<span class="first">€{{ $product->price }}</span>
				<span class="last">(-{{ $product->deal_price }}%)</span>
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			@else
			<div class="product-flash-deal-real-price">
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price, 2) }}</div>
			@endif
		</div>
		<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="visit-product"><span class="shopping-cart-icon"><i class="fa fa-angle-double-right"></i></span> <span class="add-to-cart-span">MORE DETAILS</span></div></a>
	</div>	
	@endforeach
</div>

<div class="phone-accessories-title">Phone & Accessories</div>
<div class="phone-accessories">
	@foreach($phoneAndAccessoriesProducts as $product)
	<div class="product col-xs-12 col-md-3">
		<div class="image">
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">
				<img src="{{ asset('images/products/'.$product->images[0]) }}">
			</a>
			<div class="price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="show-product-button">VIEW PRODUCT</div></a>
		</div>
		<div class="description"><a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">{{ $product->name }}</a></div>
		<div class="product-status">Available</div>
		<div>
			@if($product->flash_deal == 1)
			<div class="product-flash-deal-real-price">
				<span class="first">€{{ $product->price }}</span>
				<span class="last">(-{{ $product->deal_price }}%)</span>
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			@else
			<div class="product-flash-deal-real-price">
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price, 2) }}</div>
			@endif
		</div>
		<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="visit-product"><span class="shopping-cart-icon"><i class="fa fa-angle-double-right"></i></span> <span class="add-to-cart-span">MORE DETAILS</span></div></a>
	</div>	
	@endforeach
</div>

<div class="phone-accessories-title">Computer & Office</div>
<div class="phone-accessories">
	@foreach($computerAndOfficeProducts as $product)
	<div class="product col-xs-12 col-md-3">
		<div class="image">
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">
				<img src="{{ asset('images/products/'.$product->images[0]) }}">
			</a>
			<div class="price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="show-product-button">VIEW PRODUCT</div></a>
		</div>
		<div class="description"><a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">{{ $product->name }}</a></div>
		<div class="product-status">Available</div>
		<div>
			@if($product->flash_deal == 1)
			<div class="product-flash-deal-real-price">
				<span class="first">€{{ $product->price }}</span>
				<span class="last">(-{{ $product->deal_price }}%)</span>
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			@else
			<div class="product-flash-deal-real-price">
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price, 2) }}</div>
			@endif
		</div>
		<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="visit-product"><span class="shopping-cart-icon"><i class="fa fa-angle-double-right"></i></span> <span class="add-to-cart-span">MORE DETAILS</span></div></a>
	</div>	
	@endforeach
</div>

<div class="phone-accessories-title">Jewelry & Watches</div>
<div class="phone-accessories">
	@foreach($jewelryAndWatchesProducts as $product)
	<div class="product col-xs-12 col-md-3">
		<div class="image">
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">
				<img src="{{ asset('images/products/'.$product->images[0]) }}">
			</a>
			<div class="price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="show-product-button">VIEW PRODUCT</div></a>
		</div>
		<div class="description"><a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">{{ $product->name }}</a></div>
		<div class="product-status">Available</div>
		<div>
			@if($product->flash_deal == 1)
			<div class="product-flash-deal-real-price">
				<span class="first">€{{ $product->price }}</span>
				<span class="last">(-{{ $product->deal_price }}%)</span>
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			@else
			<div class="product-flash-deal-real-price">
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price, 2) }}</div>
			@endif
		</div>
		<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="visit-product"><span class="shopping-cart-icon"><i class="fa fa-angle-double-right"></i></span> <span class="add-to-cart-span">MORE DETAILS</span></div></a>
	</div>	
	@endforeach
</div>

<div class="phone-accessories-title">Toys</div>
<div class="phone-accessories">
	@foreach($toysProducts as $product)
	<div class="product col-xs-12 col-md-3">
		<div class="image">
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">
				<img src="{{ asset('images/products/'.$product->images[0]) }}">
			</a>
			<div class="price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="show-product-button">VIEW PRODUCT</div></a>
		</div>
		<div class="description"><a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}">{{ $product->name }}</a></div>
		<div class="product-status">Available</div>
		<div>
			@if($product->flash_deal == 1)
			<div class="product-flash-deal-real-price">
				<span class="first">€{{ $product->price }}</span>
				<span class="last">(-{{ $product->deal_price }}%)</span>
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price - ($product->deal_price / 100 * $product->price), 2) }}</div>
			@else
			<div class="product-flash-deal-real-price">
			</div>
			<div class="product-flash-deal-price">€{{ number_format($product->price, 2) }}</div>
			@endif
		</div>
		<a href="{{ route('viewProduct', array(str_replace([' ', '/', '&'], ['-', '-', 'and'], $product->name), $product->id)) }}"><div class="visit-product"><span class="shopping-cart-icon"><i class="fa fa-angle-double-right"></i></span> <span class="add-to-cart-span">MORE DETAILS</span></div></a>
	</div>	
	@endforeach
</div>
@endsection

@section('footer')
@endsection
