<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function index()
    {
        $data = Cache::rememberForever('frontend_data', function () {
            return [
                'sliders'     => \App\Models\Slider::latest()->get(),
                'featured'    => \App\Models\Feature::latest()->take(3)->get(),
                'services'    => \App\Models\Service::latest()->take(3)->get(),
                'educations'  => \App\Models\Education::latest()->get(),
                'award'       => \App\Models\Award::latest()->get(),
                'review'      => \App\Models\Review::whereStatus('active')->get(),
                'youtube'     => \App\Models\Youtube::latest()->take(3)->get(),
                'experience'  => \App\Models\Experience::latest()->get(),
                'chamber'     => \App\Models\Chamber::latest()->get(),
                'processes'   => \App\Models\Process::orderBy('position', 'asc')->get(),
                'speciallist' => \App\Models\Specialist::orderBy('position', 'asc')->get(),
            ];
        });

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
        $data['services'] = Cache::rememberForever('service_page_data', function () {
            return \App\Models\Service::latest()->take(3)->get();
        });

        return view('frontend.pages.service', $data);
    }

    public function faq()
    {
        $faqs = Cache::rememberForever('faq_page_data', function () {
            return \App\Models\Faq::all();
        });

        return view('frontend.pages.faq', compact('faqs'));
    }

    public function gallery()
    {
        $page = request()->get('page', 1);
        $cacheKey = 'gallery_page_' . $page;

        $gallery = Cache::rememberForever($cacheKey, function () {
            return \App\Models\Gallery::latest()->paginate(12);
        });

        return view('frontend.pages.gallery', compact('gallery'));
    }

    public function video()
    {
        $youtube = Cache::rememberForever('video_page_data', function () {
            return Youtube::latest()->get();
        });

        return view('frontend.pages.video', compact('youtube'));
    }
}
