<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Newsletter;
use Cart;


class NewsletterController extends Controller
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
    public function index(Request $request)
    {
    	$newsletterModel = new Newsletter();

    	$email = $request->get('newsletterEmail');
    	$emailNewsletter = $newsletterModel->getEmailFromNewsletter($email);

    	$data = array(
    		'email' => $email,
    		'status' => 'failed',
    	);

    	if(!($emailNewsletter)){
    		$newsletterModel->insertEmail($email);
    		$data['status'] = 'success';
    	}

    	return view('newsletter', $data);
    }
}
