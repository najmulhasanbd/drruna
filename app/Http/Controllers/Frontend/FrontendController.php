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
use App\Models\Experience;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Youtube;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::latest()->get();
        $data['featured'] = Feature::latest()->take(3)->get();

        $data['services'] = Service::latest()->take(3)->get();
        $data['educations'] = Education::latest()->get();
        $data['award'] = Award::latest()->get();
        $data['review'] = Review::whereStatus('active')->get();
        $data['youtube'] = Youtube::latest()->take(3)->get();
        $data['experience']=Experience::latest()->get();
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
        $data['services'] = Service::latest()->take(3)->get();
        return view('frontend.pages.service', $data);
    }
    public function faq()
    {
        $faqs = Faq::all();
        return view('frontend.pages.faq', compact('faqs'));
    }
    public function gallery()
    {
        $gallery = Gallery::latest()->paginate(18);

        return view('frontend.pages.gallery', compact('gallery'));
    }
    public function video()
    {
        $youtube = Youtube::latest()->get();
        return view('frontend.pages.video', compact('youtube'));
    }
}
