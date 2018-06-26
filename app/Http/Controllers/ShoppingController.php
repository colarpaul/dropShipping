<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Products;
use App\Http\Models\Shopping;
use Cart;


class ShoppingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
    	$product = array(
    		'id' => $request->get('productId'),
    		'name' => $request->get('productName'),
    		'price' => $request->get('productPrice'),
    		'image' => $request->get('productImage'),
    	);

    	Cart::add($product['id'], $product['name'], 1, $product['price'], ['image' => $product['image']]);
    }

    public function showCart(){
    	$data = array(
    		'cart' => Cart::content(),
    	);

    	return view('cart', $data);
    }

    public function removeProductFromCart($id){
		Cart::remove($id);

    	return back();
    }

    public function cartCheckout(){
        return view('checkout');
    }

    public function checkoutComplete(Request $request){
        $shoppingModel = new Shopping();

        $data = array(
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'address' => $request->get('address'),
            'address2' => $request->get('address2'),
            'city' => $request->get('city'),
            'region' => $request->get('region'),
            'postal_code' => $request->get('postalCode'),
            'phone' => $request->get('phone'),
            'status' => '9',
            'products' => json_encode(Cart::content()),
            'total' => (Cart::subtotal() < 5) ? Cart::subtotal()+2 : Cart::subtotal(),
            'payment_type' => 'paypal',
        );

        $shoppingModel->addOrder($data);
        Cart::destroy();

        return 'true';
    }

    public function updateCartQty(Request $request){
        Cart::update($request->get('productRowId'), ['qty' => $request->get('productQty')]);

        return Cart::get($request->get('productRowId'))->subTotal();
    }

    public function getCartSubtotal(Request $request){
        return Cart::subtotal();
    }

    public function checkoutSuccess(Request $request){
        return view('checkout_success');
    }
}
