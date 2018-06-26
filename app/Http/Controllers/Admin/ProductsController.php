<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        Log::debug('Entering into index () method ...');

        $columns = array(
            "Id",
            "Name",
            "Description",
            "Category",
            "Sub-category",
            "Best tag",
            "Tags",
            "Price",
            "Deal Price",
            "Status",
            "On Home Page?",
            "Real Website",
            "Reviews",
            "Size",
            "Flash Deal?",
            //"Images Folder",
            "Shipment Time",
            "Created At",
            "Updated At",
            "Actions"
        );
        $products_db = DB::table("products")->get();
        $products = array();
        foreach ($products_db as $value)
        {
            array_push($products, $value);
        }
        $current_page = "products";

        return view('admin.products', compact('current_page', 'products', 'columns'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add_product (Request $request)
    {
        Log::debug('Entering into add_product (Request $request) method ...');

        $product['name'] = ($request->has('name') && $request->input('name') != null) ? $request->input('name') : "-";
        $product['description'] = ($request->has('description') && $request->input('description') != null) ? $request->input('description') : "-";
        $product['category'] = ($request->has('category') && $request->input('category') != null) ? $request->input('category') : "-";
        $product['subcategory'] = ($request->has('subcategory') && $request->input('subcategory') != null) ? $request->input('subcategory') : "-";
        $product['best_tag'] = ($request->has('best_tag') && $request->input('best_tag') != null) ? $request->input('best_tag') : "-";
        $tags = $request->has('tags') ? $request->input('tags') : null;
        if ($tags !== null) { $product['tags'] = json_encode(explode(", ", $tags), JSON_FORCE_OBJECT); } else { $product['tags'] = "-"; }
        $product['price'] = ($request->has('price') && $request->input('price') != null) ? $request->input('price') : "0";
        $product['deal_price'] = ($request->has('deal_price') && $request->input('deal_price') != null) ? $request->input('deal_price') : "0";
        $product['status'] = $request->has('status') ? $request->input('status') : null;
        $product['on_home_page'] = $request->has('on_home_page') ? $request->input('on_home_page') : null;
        $product['real_website'] = ($request->has('real_website') && $request->input('real_website') != null) ? $request->input('real_website') : "-";
        $product['reviews'] = ($request->has('reviews') && $request->input('reviews') != null) ? $request->input('reviews') : "0";
        $product['size'] = ($request->has('size') && $request->input('size') != null) ? $request->input('size') : "-";
        $product['flash_deal'] = ($request->has('flash_deal') && $request->input('flash_deal') != null) ? $request->input('flash_deal') : null;
        $product['images_folder'] = ($request->has('images_folder') && $request->input('images_folder') != null) ? $request->input('images_folder') : "-";
        $product['shipment_time'] = ($request->has('shipment_time') && $request->input('shipment_time') != null) ? $request->input('shipment_time') : "-";
        $price = array(
            'category1' => '1',
            'category2' => '1.5',
            'category3' => '2',
            'category4' => '2.5',
            'category5' => '3',
            'category6' => '3.5',
            'category7' => '4',
            'category8' => '4.5',
            'category9' => '5',
            'category10' => '5.5',
            'category11' => '6',
        );
        if($product['price'] <= 1){
            $product['price'] = $price['category1'] + $product['price'];
        } elseif($product['price'] > 1 AND $product['price'] <= 2){
            $product['price'] = $price['category2'] + $product['price'];
        } elseif($product['price'] > 2 AND $product['price'] <= 3){
            $product['price'] = $price['category3'] + $product['price'];
        } elseif($product['price'] > 3 AND $product['price'] <= 4){
            $product['price'] = $price['category4'] + $product['price'];
        } elseif($product['price'] > 4 AND $product['price'] <= 5){
            $product['price'] = $price['category5'] + $product['price'];
        } elseif($product['price'] > 5 AND $product['price'] <= 6){
            $product['price'] = $price['category6'] + $product['price'];
        } elseif($product['price'] > 6 AND $product['price'] <= 7){
            $product['price'] = $price['category7'] + $product['price'];
        } elseif($product['price'] > 7 AND $product['price'] <= 8){
            $product['price'] = $price['category8'] + $product['price'];
        } elseif($product['price'] > 8 AND $product['price'] <= 9){
            $product['price'] = $price['category9'] + $product['price'];
        } elseif($product['price'] > 9 AND $product['price'] <= 10){
            $product['price'] = $price['category10'] + $product['price'];
        } else {
            $product['price'] = $price['category11'] + $product['price'];
        }
        DB::table("products")->insert(
            [
                'name' => $product['name'],
                'description' => $product['description'],
                "category" => $product['category'],
                "subcategory" => $product['subcategory'],
                "best_tag" => $product['best_tag'],
                "tags" => $product['tags'],
                "price" => $product['price'],
                "deal_price" => $product['deal_price'],
                "status" => $product['status'],
                "on_home_page" => $product['on_home_page'],
                "real_website" => $product['real_website'],
                "reviews" => $product['reviews'],
                "size" => $product['size'],
                "flash_deal" => $product['flash_deal'],
                "images_folder" => $product['images_folder'],
                "shipment_time" => $product['shipment_time']
            ]
        );

        return redirect('/admin/products/index');
    }

    /**
     * @param $id
     * @return string
     */
    public function delete_product ($id)
    {
        Log::debug('Entering into delete_product ($id) method ...');

        $product_id = explode(",", $id)[0];
        $images_folder = explode(",", $id)[1];
        if (!is_null(DB::table('products')->where([
            ['id', $id]
        ])->get()))
        {
            $path = public_path("/images/products/" . $images_folder . "/");
            if (file_exists($path))
            {
                if (is_dir($path))
                {
                    $files = glob($path . "/*");
                    foreach ($files as $file)
                    {
                        unlink($file);
                    }
                    rmdir($path);
                }
            }
            if (DB::table('products')->where([
                ['id', $product_id]
                ])->delete()
            )
            {
                return json_encode(
                    array
                    (
                        "status" => "success",
                        'message' => "Product with id " . $product_id . " deleted successfuly."
                    )
                );
            }
        }

        return json_encode(
            array
            (
                "status" => "failed",
                'message' => "Product with id " . $product_id . " could not be deleted successfuly."
            )
        );
    }

    /**
     * @param Request $request
     * @return string
     */
    public function upload_product_images (Request $request)
    {
        Log::debug('Entering into uploadproductimages () method ...');
        
        $file = $_FILES["image-upload"];
        if (file_exists(public_path("/images/products/" . $request->input("images_folder") . "/")))
        {
            $target_dir = public_path("/images/products/" . $request->input("images_folder") . "/");
        }
        else
        {
            mkdir(public_path("/images/products/" . $request->input("images_folder") . "/"), 0777, true);
            $target_dir = public_path("/images/products/" . $request->input("images_folder") . "/");
        }
        $target_file = $target_dir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target_file))
        {
            return json_encode(
                array
                (
                    "status" => "success"
                )
            );
        }
        else
        {
            return json_encode(
                array
                (
                    "status" => "failed"
                )
            );
        }
    }

}
