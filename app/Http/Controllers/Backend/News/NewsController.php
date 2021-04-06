<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNews;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = new News();

        $datanews = $news->search()
            ->paginate(config('app.setting.backend.no_of_records'));
        $rank = $datanews->firstItem();
        return view('admin::news.index', compact('datanews', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = new NewsCategory();
        $getcategory = $category->get();
        return view('admin::news.add', compact('getcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
        //
        
        // $slug = News::whereSlug($request->slug)->first();

        // $validate = [
        //     'slug' => is_null($slug) ? 'nullable' : 'unique:title,slug'
        // ];

        // $request->validated();
        // $request->validate($validate);


        $image_original_name = null;

        if ($request->hasFile('image')) {
            // create unique name
            $image_original_name = Str::uuid() . '.' . $request->image->extension();
            $image_name = "news-r-{$image_original_name}";

            $height = Image::make($request->image)->height();
            $width = Image::make($request->image)->width();

            // resize fit real width heigh
            $realimage = Image::make($request->image)->fit($width, $height);

            Storage::disk('public')->put("media/{$image_name}", (string)$realimage->encode('jpg', 72));


        }
        // dd($request->publish);
        // insert
        $news = new News();
        $news->category_id = $request->category;
        $news->title = $request->title;
        $news->image = $image_original_name;
        $news->content = html_entity_decode($request->content);


        $news->slug = ($request->slug != null ) ? $request->slug : date("dmYs").'-'.Str::slug($request->title);
        $news->publish = $request->publish ?? 0;
        $news->created_by_id = \Auth::id();

        $news->save();
        session()->flash('success', 'Berhasil simpan data');
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
