<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::latest()->get();
        return view('frontend.index', $data);
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
    public function video()
    {
        return view('frontend.pages.video');
    }
}
