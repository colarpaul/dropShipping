@extends('layouts.layout')

@section('content')
<div class="cart-container-main">
	@if(Cart::count() > 0)
	<div class="cart-title">Shopping cart</div>
	<div class="cart-container col-xs-12 col-md-8">
		<div class="title">Products sold and delivered by onlineShop</div>
		@foreach($cart as $product)
		<div class="col-xs-12 col-md-12 product product-{{ $product->id }}">
			<div class="image col-xs-3 col-md-2">
				<a href="{{ route('viewProduct', array(str_replace(' ', '-', $product->name), $product->id)) }}"><img src="{{ asset('/images/products/'.$product->options->image) }}"></a>
			</div>
			<div class="name col-xs-5 col-md-8">
				<a href="{{ route('viewProduct', array(str_replace(' ', '-', $product->name), $product->id)) }}"><div>{{ $product->name }}</div></a>
			</div>
			<div class="col-xs-2 col-md-1">
				<div class="qty">
					<select data-product="{{ $product->rowId }}" data-productid="{{ $product->id }}">
						@for($i=1; $i<=50; $i++)
						<option value="{{ $i }}" @if($i == $product->qty) selected @endif>{{ $i }}</option>
						@endfor
					</select></div>
				</div>
				<div class="col-xs-1 col-md-1">
					<div class="product-price">€{{ number_format($product->price * $product->qty, 2) }}</div>
					<div class="remove-button"><a href="{{ route('removeProductFromCart', $product->rowId) }}">Remove</a></div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="col-xs-12 col-md-3 col-md-offset-1 cart-total-container">
			<div class="title">Order summary</div>
			<div class="total">Total products: <span>€{{ Cart::subtotal() }}</span></div>
			<div class="shipment">Shipment payment: <span>@if(Cart::subtotal() >= 5) FREE @else €2.00 @endif</span></div>
			<div><hr></div>
			<div class="total-big">Total:</div>
			<div class="total-price">€@if(Cart::subtotal() >= 5){{ Cart::subtotal() }}@else{{ Cart::subtotal() + 2 }}@endif</div>
			<a href="{{ route('cartCheckout') }}"><div class="button-payment">Next Step</div></a>
		</div>
		@else
		<div class="cart-container cart-container-empty col-md-12">
			<div class="title">Your Shopping Cart is empty</div>
		</div>
		@endif
	</div>
</div>
@endsection

@section('footer')
@endsection
