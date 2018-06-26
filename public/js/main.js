$('#flagstrap').flagStrap({
	countries: {
		"US": "United States",
                    // "DE": "Deutschland",
                    // "RO": "Romania"
                },
                buttonSize: "btn-sm",
                labelMargin: "10px",
                scrollable: true,
                scrollableHeight: "350px"
            });
if($(window).width() >= 1200){
	$('.flash-deals').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
	});
}
if($(window).width() >= 992 && $(window).width() < 1200){
	$('.flash-deals').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
	});
}
if($(window).width() < 992){
	$('.flash-deals').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
	});
}


$('.cart-containet-checkout-main .step-1 form').submit(function(e){
	e.preventDefault();

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

	$('.input-design').attr('disabled', true);
	$('.step-2').fadeIn('slow');
});

$('.cart-containet-checkout-main .step-2 .cart-next').on('click', function(e){
	e.preventDefault();

	$('.qty select').attr('disabled', true);
	var inserted = false;

	if(inserted == false){
		$.ajax({
			url: "/cart/subtotal",
			success: function (data) {
				var subtotalCart = data;
				$('.payment-details-checkout .payment-subtotal').html('€' + subtotalCart);
				$('.cart-total-container .total span').html('€' + subtotalCart);
				if(data < 5){
					var totalCart = (Number(data) + Number(2)).toFixed(2);
					$('.payment-details-checkout .total-payment .payment-checkout').html('€' + totalCart);
					$('.cart-total-container .total-price').html('€' + totalCart);
					$('.payment-details-checkout .payment-shipping span').html('€2.00');
					$('.cart-total-container .shipment span').html('€2.00');
				} else {
					var totalCart = Number(subtotalCart).toFixed(2);
					var shipping = 'FREE';
					$('.payment-details-checkout .total-payment .payment-checkout').html('€' + totalCart);
					$('.cart-total-container .total-price').html('€' + totalCart);
					$('.payment-details-checkout .payment-shipping span').html(shipping);
					$('.payment-details-checkout .payment-shipping').html(shipping);
				}
				inserted = true;
			}
		});
	}

	$('.step-3').fadeIn('slow');
});

$('.cart-container .qty select').on('change', function (e) {
	var optionSelected = $("option:selected", this);
	var valueSelected = this.value;

	var counter = 0;
	$('.cart-container .qty select').each(function(index){
		if ($(this).has('option:selected')){
			counter = Number(counter) + Number($(this).val());
		}
	});
	$('.shopping-cart-counter').html(counter);

	var productRowId = $(this).data('product');
	var productId = $(this).data('productid');
	var productQty = valueSelected;
	$.ajax({
		url: "/cart/updateCartQty",
		data: { 'productRowId': productRowId, 'productQty': productQty },
		success: function (data) {
			$('.product-'+ productId + ' .product-price').html('€' + data);

			$.ajax({
				url: "/cart/subtotal",
				success: function (data) {
					var subtotalCart = data;
					$('.cart-total-container .total span').html('€' + subtotalCart);
					if(data < 5){
						var totalCart = (Number(data) + Number(2)).toFixed(2);
						$('.cart-total-container .total-price').html('€' + totalCart);
						$('.cart-total-container .shipment span').html('€2.00');
					} else {
						var totalCart = Number(subtotalCart).toFixed(2);
						var shipping = 'FREE';
						$('.cart-total-container .total-price').html('€' + totalCart);
						$('.cart-total-container .shipment span').html(shipping);
					}
					inserted = true;
				}
			});
		}
	});


});



$('.buy-now-button').on('click', function(e){
	e.preventDefault();

	if($(window).width() < 1200){
		$(this).html('<span class="shopping-cart-icon"><i class="fa fa-spinner"></i></span> ADDING TO YOUR CART...');
		
		setTimeout(function () {
			$('.buy-now-button').html('<span class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></span> ADD TO CART');
		}, 1300);
		
	}

	var cart = $('.shopping-cart');
	var imgtodrag = $('.slick-active img:first-child').eq(0);
	if (imgtodrag) {
		var imgclone = imgtodrag.clone()
		.offset({
			top: imgtodrag.offset().top,
			left: imgtodrag.offset().left
		})
		.css({
			'opacity': '0.5',
			'position': 'absolute',
			'height': '150px',
			'width': '150px',
			'z-index': '100'
		})
		.appendTo($('body'))
		.animate({
			'top': cart.offset().top + 10,
			'left': cart.offset().left + 10,
			'width': 75,
			'height': 75
		}, 1000);

		setTimeout(function () {
			cart.effect("shake", {
				times: 2
			}, 500);

			var countCart = $('.shopping-cart-counter').html();
			$('.shopping-cart-counter').html(Number(countCart) + Number(1));

			if($(window).width() < 1200){
				$('.checkmark-image').html('');
				$('.checkmark-image').css('display', 'none');
				$('.buy-now-button').css('display', 'block');
			}
			

		}, 1500);

		imgclone.animate({
			'width': 0,
			'height': 0
		}, function () {
			$(this).detach()
		});
	}

	var productId = $(this).data('id');
	var productName = $(this).data('name');
	var productPrice = $(this).data('price');
	var productImage = $(this).data('image');

	$.ajax({
		url: "/cart/add",
		data: { 'productId' : productId, 'productName': productName, 'productPrice': productPrice, 'productImage': productImage }
	});
});

$('.add-to-cart').on('click', function(e){
	e.preventDefault();

	if($(window).width() < 1200){
		$(this).html('<span class="shopping-cart-icon"><i class="fa fa-spinner"></i></span> ADDING TO YOUR CART...');
		
		setTimeout(function () {
			$('.add-to-cart').html('<span class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></span> ADD TO CART');
		}, 1300);
		
	}

	var cart = $('.shopping-cart');
	var imgtodrag = $(this).closest('.product').find('.image img:first-child').eq(0);
	if (imgtodrag) {
		var imgclone = imgtodrag.clone()
		.offset({
			top: imgtodrag.offset().top,
			left: imgtodrag.offset().left
		})
		.css({
			'opacity': '0.5',
			'position': 'absolute',
			'height': '150px',
			'width': '150px',
			'z-index': '100'
		})
		.appendTo($('body'))
		.animate({
			'top': cart.offset().top + 10,
			'left': cart.offset().left + 10,
			'width': 75,
			'height': 75
		}, 1000);

		setTimeout(function () {
			cart.effect("shake", {
				times: 2
			}, 500);

			var countCart = $('.shopping-cart-counter').html();
			$('.shopping-cart-counter').html(Number(countCart) + Number(1));

			if($(window).width() < 1200){
				$('.checkmark-image').html('');
				$('.checkmark-image').css('display', 'none');
				$('.buy-now-button').css('display', 'block');
			}
			

		}, 1500);

		imgclone.animate({
			'width': 0,
			'height': 0
		}, function () {
			$(this).detach()
		});
	}

	var productId = $(this).data('id');
	var productName = $(this).data('name');
	var productPrice = $(this).data('price');
	var productImage = $(this).data('image');

	$.ajax({
		url: "/cart/add",
		data: { 'productId' : productId, 'productName': productName, 'productPrice': productPrice, 'productImage': productImage }
	});
});

randomProductNotification();

$(document).on('click', '.close-notification', function(event) {
	$('.notification-popup').fadeOut('slow');
	$('.notification-popup').css('display', 'none');
});

function randomProductNotification() {
	if($(window).width() >= 1200){
		setTimeout(function () {

			if(!$('.notification-popup').is(':visible')){
				$.ajax({
					url: "/product/getRandomProduct",
				}).done(function(data){
					data = JSON.parse(data);
					name = data.name;
					$('.notification-popup .image img').attr('src', '/images/products/'+data.images[0]);
					$('.notification-popup .description').html('Someone just bought'+' "'+name+'"');
					$('.product-notification-hyperlink').attr('href', '/product/'+name.replace(/ /g, '-')+'/'+data.id);
					$('.notification-popup').fadeIn('slow');
				});
			}
			randomProductNotification();
		}, 150000);
	}
	
}


