<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function Index($page)
    {
        // dd($page);
        $pagedet = Pages::where('slug', $page)->first();

        if ($pagedet == null) {
            abort(404);
        }
        return view('public::page', compact('pagedet'));
    }
}
