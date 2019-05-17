<?php

namespace App\Http\Controllers\Mip;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementController extends Controller
{
    //
    public function about()
    {
        return view('mip.about');
    }
    public function contact()
    {
        return view('mip.about_contact');
    }
    public function youshi()
    {
        return view('mip.about_youshi');
    }
    public function hezuo()
    {
        return view('mip.about_hezuo');
    }
    public function disclaimer()
    {
        return view('mip.about_disclaimer');
    }
    public function flgw()
    {
        return view('mip.about_flgw');
    }
    public function friendLinks()
    {
        return view('mip.about_friendlinks');
    } public function sitemap()
    {
        return view('mip.about_sitemap');
    }
}
