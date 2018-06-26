<?php

namespace App\Http\Models;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Products 
{
	public function getFlashDealProducts(){
		return DB::table('products')->where('flash_deal', 1)->get();
	}

	public function getPhoneAndAccessoriesProducts(){
		return DB::table('products')->where('category', 'Phone & Accessories')->where('on_home_page', 1)->get();
	}

	public function getComputerAndOfficeProducts(){
		return DB::table('products')->where('category', 'Computer & Office')->where('on_home_page', 1)->get();
	}

	public function getJewelryAndWatchesProducts(){
		return DB::table('products')->where('category', 'Jewelry & Watches')->where('on_home_page', 1)->get();
	}

	public function getToysProducts(){
		return DB::table('products')->where('category', 'Toys')->where('on_home_page', 1)->get();
	}

	public function getProductImage($id){
		$image = DB::table('products')->select('images')->where('id', $id)->first();
		return $image->images;
	}

	public function getProduct($id){
		return DB::table('products')->where('id', $id)->first();
	}

	public function getRandomProduct(){
		return DB::table('products')->orderBy(DB::raw('RAND()'))->first(); 
	}

	public function getCategories(){
		return DB::table('products')->select('category')->where('status', '1')->groupBy('category')->get(); 
	}

	public function getProductsByCategory($category){
		return DB::table('products')->where('category', $category)->paginate(20);
	}

	public function getProductsBySubcategory($subcategory){
		return DB::table('products')->where('subcategory', $subcategory)->paginate(20);
	}

	public function getProductByKey($searchKey){
		return DB::table('products')->where('name', 'like' ,'%'.$searchKey.'%')->orWhere('best_tag', 'like' ,'%'.$searchKey.'%')->orWhere('tags', 'like' ,'%'.$searchKey.'%')->paginate(20);
	}
}
