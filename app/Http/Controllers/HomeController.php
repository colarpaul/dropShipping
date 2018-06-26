<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Products;
use App;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productModel = new Products();
        $flashDealProducts = $productModel->getFlashDealProducts();
        foreach($flashDealProducts as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }


        $phoneAndAccessoriesProducts = $productModel->getPhoneAndAccessoriesProducts();
        foreach($phoneAndAccessoriesProducts as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $computerAndOfficeProducts = $productModel->getComputerAndOfficeProducts();
        foreach($computerAndOfficeProducts as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $jewelryAndWatchesProducts = $productModel->getJewelryAndWatchesProducts();
        foreach($jewelryAndWatchesProducts as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $toysProducts = $productModel->getToysProducts();
        foreach($toysProducts as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $categories = $productModel->getCategories();

        $data = array(
            'flashDealProducts' => $flashDealProducts,
            'phoneAndAccessoriesProducts' => $phoneAndAccessoriesProducts,
            'computerAndOfficeProducts' => $computerAndOfficeProducts,
            'jewelryAndWatchesProducts' => $jewelryAndWatchesProducts,
            'toysProducts' => $toysProducts,
            'categories' => $categories,
        );

        return view('welcome', $data);
    }

    public function refundPolicy(){
        return view('refund_policy');
    }

    public function privacyPolicy(){
        return view('privacy_policy');

    }

    public function termsService(){
        return view('terms_service');

    }
}
