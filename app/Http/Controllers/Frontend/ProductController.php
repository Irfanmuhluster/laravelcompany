<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id_category = $request->filter;
        $listcategory = CategoryProduct::select('id','category_name')
        ->get();

        $listproduct = Product::select('category_id','url','product_name','product_description', 'image', 'publish')
        ->when($id_category, function ($query, $id_category) {
            return $query->where('category_id', $id_category);
        })
        ->get();
        // ->when($request, function ($query, $request) {
        //     return $query->where('id', $request->filter);
        // })
        return view('public::product', compact('listcategory', 'listproduct'));
    }

}
