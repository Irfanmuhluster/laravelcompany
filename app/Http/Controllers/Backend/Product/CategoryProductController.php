<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = new CategoryProduct();
        $datacategory = $category->search()
            ->paginate(config('app.setting.backend.no_of_records'));
        $rank = $datacategory->firstItem();
        return view('admin::product.category.index', compact('datacategory' ,'rank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = \Validator::make($request->all() ,[
            'category_name' => ['required', 'max:255'],
        ],
        $messages = [
            'category_name.required' => 'Nama kategori harus diisi',
        ]);

        if (! $validated->fails()) {
            CategoryProduct::create([
                'category_name' => $request->category_name,
             ]);

            return redirect()->back()->with(['success' => 'Berhasil tambah kategori']);
        }

        $validated->errors()->add('form_active', 'store');
        return redirect()->back()->withErrors($validated);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = new CategoryProduct();
        
        $validated = \Validator::make($request->all() ,[
            'edit_category_name' => ['required', 'max:255'],
        ]);

        if (! $validated->fails()) {
            // dd($request);
            $category = CategoryProduct::find($id);
            $category->category_name = $request->edit_category_name;
            $category->save();

            // session()->flash('success', __('news::trans.edit_category_success'));
            return redirect()->route('admin.produkcategory.index')->with('success', 'Berhasil update Kategori');
            // return redirect()->route('backend.news.category.index', [ 'form_active' => 'update', 'id' => $request->id ]);
        }

        $validated->errors()->add('form_active', 'update');
        return redirect()->back()->withErrors($validated);
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
        CategoryProduct::findOrFail($id)->delete();
        return redirect()->route('admin.produkcategory.index')->with('success', 'Berhasil hapus Kategori');
    }
}
