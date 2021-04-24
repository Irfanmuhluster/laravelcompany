<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduk;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = new Product();

        $dataproduk = $produk->search()->paginate(config('app.setting.backend.no_of_records'));
        $rank = $dataproduk->firstItem();
        return view('admin::product.product.index', compact('dataproduk', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = new CategoryProduct();
        $getcategory = $category->select('id', 'category_name')->get();
        return view('admin::product.product.add', compact('getcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduk $request)
    {
        //
        // dd($request);
        $image_original_name = null;

        if ($request->hasFile('image')) {
            // create unique name
            $image_original_name = Str::uuid() . '.' . $request->image->extension();
            $image_name = "product-r-{$image_original_name}";

            $height = Image::make($request->image)->height();
            $width = Image::make($request->image)->width();

            // resize fit real width heigh
            $realimage = Image::make($request->image)->fit($width, $height);

            Storage::disk('public')->put("media/{$image_name}", (string)$realimage->encode('jpg', 72));


        }
        // dd($request->publish);
        // insert
        $product = new Product();
        $product->category_id = $request->category;
        $product->url = $request->url;
        $product->product_name = $request->product_name;
        $product->image = $image_original_name;
        $product->product_description = html_entity_decode($request->product_description);
        $product->publish = $request->publish ?? 0;
        // $product->created_by_id = \Auth::id();

        $product->save();
        session()->flash('success', 'Berhasil simpan data');
        return redirect()->route('admin.produk.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $produk)
    {
        //
        // dd($produk);
        $category = new CategoryProduct();
        $getcategory = $category->select('id', 'category_name')->get();
        return view('admin::product.product.update', compact('produk', 'getcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduk $request, Product $produk)
    {
        //

        $image_original_name = null;

        // dd($request->hasFile('image'));

        if ($request->hasFile('image')) {

            //  dd('lohloh');
            // create unique name
            $image_original_name = Str::uuid() . '.' . $request->image->extension();
            $image_name = "product-r-{$image_original_name}";

            $height = Image::make($request->image)->height();
            $width = Image::make($request->image)->width();

            // resize fit real width heigh
            $realimage = Image::make($request->image)->fit($width, $height);

            Storage::disk('public')->put("media/{$image_name}", (string)$realimage->encode('jpg', 72));

            $image_old_exists = Storage::disk('public')->exists("media/product-r-{$produk->image}");

            // delete image
            if ($image_old_exists) {
                Storage::disk('public')->delete("media/product-r-{$produk->image}");
            }

            
            $produk->image = $image_original_name;
        }

        $produk->category_id = $request->category;
        $produk->product_name = $request->product_name;
        $produk->url = $request->url;
        $produk->product_description = html_entity_decode($request->product_description);
        $produk->publish = $request->publish ?? 0;
        $produk->save();

        // dd($produk);
       
        
        session()->flash('success', 'Berhasil update data');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Berhasil hapus Kategori');
    }
}
