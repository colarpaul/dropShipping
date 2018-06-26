<?php

namespace App\Http\Models;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Newsletter 
{
	public function getEmailFromNewsletter($email){
		return DB::table('newsletter')->where('email', $email)->first();
	}

	public function insertEmail($email){
		DB::table('newsletter')->insert([
			'email' => $email,
			'newsletter' => 1,
		]);
	}
}
