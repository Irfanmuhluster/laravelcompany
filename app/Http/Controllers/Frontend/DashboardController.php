<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        # code...
        
        // $listpages = Pages::select('title', 'slug', 'content', 'image', 'published')->get();
        return view('public::index');
    }
}
