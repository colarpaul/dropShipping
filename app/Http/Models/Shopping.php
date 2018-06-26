<?php

namespace App\Http\Models;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Shopping 
{
	public function addOrder($data){
		DB::table('orders')->insert([
			'name' => $data['name'],
			'country' => $data['country'],
                  'address' => $data['address'],
                  'address2' => $data['address2'],
                  'city' => $data['city'],
                  'region' => $data['region'],
                  'postal_code' => $data['postal_code'],
                  'phone' => $data['phone'],
                  'status' => $data['status'],
                  'products' => $data['products'],
                  'total' => $data['total'],
                  'payment_type' => $data['payment_type'],
            ]);
	}
}
