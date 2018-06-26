@extends('layouts.layout')

@section('content')

<div class="cart-container-main cart-cotainer-checkout-main cart-containet-checkout-main col-xs-12">
	@if(Cart::count() > 0)
	<div class="step-1">
		<div class="title col-md-12">1. Complete your shipping information:</div>
		<form action="#">
			<div class="form-shipment col-xs-12 col-md-7">
				<div class="contact-name col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">Contact Name</span><input class="col-xs-12 col-md-8 input-design input-name" type="text" placeholder="Contact Name" required>
					<input type="hidden" class="hidden-name" name="contact-name" required>
				</div>
				<div class="country-region col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">Country/Region</span><input class="col-xs-12 col-md-8 input-design input-country" type="text" placeholder="Country/Region" required>
					<input type="hidden" class="hidden-country" name="country" required>
				</div>
				<div class="street-address col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">Street Address</span><input class="col-xs-12 col-md-8 input-design input-address" type="text" placeholder="Street Address" required>
					<input type="hidden" class="hidden-address" name="address" required>
				</div>
				<div class="street-address-optional col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3"></span><input class="col-xs-12 col-md-8 input-design input-address2" type="text" placeholder="Apartment, suite, unit etc. (optional)">
					<input type="hidden" class="hidden-address2" name="address2">
				</div>
				<div class="city col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">City</span><input class="col-xs-12 col-md-8 input-design input-city" type="text" placeholder="City" required>
					<input type="hidden" class="hidden-city" name="city" required>
				</div>
				<div class="state-province-region col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">State/Region</span><input class="col-xs-12 col-md-8 input-design input-region" type="text" placeholder="State/Province/Region" required>
					<input type="hidden" class="hidden-region" name="region" required>
				</div>
				<div class="zip-postal-code col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">Zip/Postal Code</span><input class="col-xs-12 col-md-8 input-design input-postal-code" type="text" placeholder="Zip/Postal Code" required>
					<input type="hidden" class="hidden-postal-code" name="postal-code" required>
				</div>
				<div class="mobile col-xs-12 col-md-12">
					<span class="hidden-xs col-md-3">Mobile Phone</span><input class="col-xs-12 col-md-8 input-design input-phone" type="text" placeholder="Mobile Phone" required>
					<input type="hidden" class="hidden-phone" name="phone" required>
				</div>
			</div>
			<div class="col-md-12 shipment-next-container">
				<button type="submit" class="shipment-next col-md-offset-5">Next Step</button>
			</div>
		</form>
	</div>

	<div class="step-2">
		<div class="title col-md-12">2. Review and confirm your order ({{ Cart::count() }} @if(Cart::count()==1) item @else items @endif)</div>

		<div class="cart-container cart-checkout-container col-md-7">
			@foreach(Cart::content() as $product)
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
						</select>
					</div>
				</div>
				<div class="col-xs-1 col-md-1">
					<div class="product-price">€{{ number_format($product->price * $product->qty, 2) }}</div>
					<div class="remove-button"><a href="{{ route('removeProductFromCart', $product->rowId) }}">Remove</a></div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="col-md-12 shipment-next-container">
			<button type="submit" class="cart-next col-md-offset-5">Next Step</button>
		</div>
	</div>

	<div class="step-3">
		<div class="title payment-checkout-title col-md-12">3. Payment</div>
		<div class="payment-details-checkout col-md-12 col-md-7">
			<div class="total-products col-md-10">Total products:</div> <span class="payment-checkout payment-subtotal col-md-2">€{{ Cart::subtotal() }}</span>
			<div class="total-shipment col-md-10">Shipping payment: </div><span class="payment-checkout payment-shipping col-md-2">@if(Cart::subtotal() >= 5) FREE @else €2.00 @endif</span>
			@if(Cart::subtotal() < 5) <div class="hint-class col-md-12">Shipping is FREE only for orders over €5.00</div> @endif
			<div class="total-payment col-md-12">Total:<span class="payment-checkout">@if(Cart::subtotal() < 5) €{{ Cart::subtotal() + 2 }}@else €{{ Cart::subtotal() }}@endif</span></div>
			<div type="submit" id="paypal-button"></div>
		</div>
	</div>
	@else
	<script type="text/javascript">
		window.location = "{{ route('cart') }}";
	</script>
	@endif
</div>
@endsection

@section('footer')
<script>
	paypal.Button.render({
        env: 'production', // Or 'sandbox'

        client: {
        	sandbox:    'AVc894sQK6oWUnQTAhk5vgA375Y2-5fITnjVPc3w22WBADdkXPI7dW8DCrLTJkwtb5r5xc4i6_1T-CvG',
        	production: 'ASXf0D1O9FRiiw6i4c0wopfDtrkD-k5r6mJPGaZOauYfVYVvOPAG4KTC1iy4oqhTXbX4i4WWeTncCOTE'
        },

        commit: true, // Show a 'Pay Now' button

        style: {
        	size: 'medium',
        	color: 'gold',
        	shape: 'rect',
        	label: 'checkout'
        },

        payment: function(data, actions) {
        	return actions.payment.create({
        		payment: {
        			transactions: [
        			{
        				amount: { total: ($('.payment-details-checkout .total-payment .payment-checkout').html()).replace('€', ''), currency: 'EUR' }
        			}
        			]
        		}
        	});
        },

        onAuthorize: function(data, actions) {
        	return actions.payment.execute().then(function(payment) {
        		var name = $('.input-name').val();
        		var country = $('.input-country').val();
        		var address = $('.input-address').val();
        		var address2 = $('.input-address2').val();
        		var city = $('.input-city').val();
        		var region = $('.input-region').val();
        		var postalCode = $('.input-postal-code').val();
        		var phone = $('.input-phone').val();

        		$('.hidden-name').val(name);
        		$('.hidden-country').val(country);
        		$('.hidden-address').val(address);
        		$('.hidden-address2').val(address2);
        		$('.hidden-city').val(city);
        		$('.hidden-region').val(region);
        		$('.hidden-postal-code').val(postalCode);
        		$('.hidden-phone').val(phone);

        		var cartData = {
        			'name' : name,
        			'country' : country,
        			'address' : address,
        			'address2' : address2,
        			'city' : city,
        			'region' : region,
        			'postalCode' : postalCode,
        			'phone' : phone,
        		};

        		$.ajax({
        			url: "{{ route('checkoutComplete') }}",
        			data: cartData,
        		}).done(function(data){
        			if(data == 'true'){
        				window.location = "{{ route('checkoutSuccess') }}";
        			}
        		});
        	});
        }

    }, '#paypal-button');
</script>
@endsection
