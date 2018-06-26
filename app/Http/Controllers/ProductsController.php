<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Products;
use Cart;
use Storage;
use File;


class ProductsController extends Controller
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
    public function index($slug, $id, Request $request){
        $productModel = new Products();

        $product = $productModel->getProduct($id);

        $directory = $product->images_folder;
        $files = File::allfiles(public_path()."/images/products/".$directory);
        foreach($files as $file){
            $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
        }

        $data = array(
            'product' => $product,
        );

        return view('product', $data);
    }

    public function categoriesPage($category){
        $productModel = new Products();

        $category = str_replace(['-', 'and'], [' ', '&'], $category);
        $products = $productModel->getProductsByCategory($category);


        foreach($products as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $data = array(
            'products' => $products,
            'category' => $category,
        );

        return view('categories', $data);
    }

    public function subcategoriesPage($subcategory){
        $productModel = new Products();

        $subcategory = str_replace(['-', 'and'], [' ', '&'], $subcategory);
        $products = $productModel->getProductsBySubcategory($subcategory);

        foreach($products as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $data = array(
            'products' => $products,
            'subcategory' => $subcategory,
        );

        return view('subcategories', $data);
    }

    public function searchProduct($searchKey){
        $productModel = new Products();

        $searchKey = str_replace(['-', 'and'], [' ', '&'], $searchKey);
        $products = $productModel->getProductByKey($searchKey);

        foreach($products as $product)
        {
            $directory = $product->images_folder;
            $files = File::allfiles(public_path()."/images/products/".$directory);
            foreach($files as $file){
                $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
            }
        }

        $data = array(
            'products' => $products,
            'searchKey' => $searchKey,
        );

        return view('searchProduct', $data);
    }

    public function getRandomProduct(){

        $productModel = new Products();

        $product = $productModel->getRandomProduct();

        $directory = $product->images_folder;
        $files = File::allfiles(public_path()."/images/products/".$directory);
        foreach($files as $file){
            $product->images[] = $product->images_folder.'/'.File::name($file).'.'.File::extension($file);
        }

        return json_encode($product);
    }
}
