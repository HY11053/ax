<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementController extends Controller
{
    //
    public function about()
    {
        return view('mobile.about');
    }
    public function contact()
    {
        return view('mobile.about_contact');
    }
    public function youshi()
    {
        return view('mobile.about_youshi');
    }
    public function hezuo()
    {
        return view('mobile.about_hezuo');
    }
    public function disclaimer()
    {
        return view('mobile.about_disclaimer');
    }
    public function flgw()
    {
        return view('mobile.about_flgw');
    }
    public function friendLinks()
    {
        return view('mobile.about_friendlinks');
    } public function sitemap()
    {
        return view('mobile.about_sitemap');
    }
}
