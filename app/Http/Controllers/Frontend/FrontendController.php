<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Award;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::latest()->get();
        $data['featured'] = Feature::latest()->take(3)->get();

        $data['services'] = Service::latest()->take(3)->get();
        $data['educations'] = Education::latest()->get();
        $data['award'] = Award::latest()->get();
        $data['review']=Review::whereStatus('active')->get();
        return view('frontend.index', $data);
    }

    public function reviewStore(Request $request)
    {
        Review::create([
            'name' => $request->name,
            'workplace' => $request->workplace,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Thank Your for Review!',
        ]);
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
