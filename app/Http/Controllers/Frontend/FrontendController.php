<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function service()
    {
        return view('frontend.pages.service');
    }
    public function faq()
    {
        return view('frontend.pages.faq');
    }
    public function gallery()
    {
        return view('frontend.pages.gallery');
    }
}
