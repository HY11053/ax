<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementController extends Controller
{
    //
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.about_contact');
    }
    public function youshi()
    {
        return view('frontend.about_youshi');
    }
    public function hezuo()
    {
        return view('frontend.about_hezuo');
    }
    public function disclaimer()
    {
        return view('frontend.about_disclaimer');
    }
    public function flgw()
    {
        return view('frontend.about_flgw');
    }
    public function friendLinks()
    {
        return view('frontend.about_friendlinks');
    }
    public function guestbook()
    {
        return view('frontend.guestbook');
    }

    public function sitemap()
    {
        return view('frontend.about_sitemap');
    }
    public function shantie()
    {
        return view('frontend.shantie');
    }
}
