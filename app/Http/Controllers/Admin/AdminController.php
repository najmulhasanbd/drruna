<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'slider_count'     => \App\Models\Slider::count(),
            'service_count'    => \App\Models\Service::count(),
            'award_count'      => \App\Models\Award::count(),
            'review_count'     => \App\Models\Review::count(),
            'youtube_count'    => \App\Models\Youtube::count(),
            'experience_count' => \App\Models\Experience::count(),
            'chamber_count'    => \App\Models\Chamber::count(),
            'faq_count'        => \App\Models\Faq::count(),
            'gallery_count'    => \App\Models\Gallery::count(),
            'feature_count'    => \App\Models\Feature::count(),
            'education_count'  => \App\Models\Education::count(),
            'specialist_count' => \App\Models\Specialist::count(),
        ];

        return view('dashboard', $data);
    }

    public function review()
    {
        $review = Review::latest()->get();
        return view('admin.review.index', compact('review'));
    }

    public function reviewStatus($id)
    {
        $review = Review::findOrFail($id);

        // Status Toggle Logic
        if ($review->status == 'pending') {
            $review->status = 'active';
        } else {
            $review->status = 'pending';
        }

        $review->save();

        return redirect()->back()->with('success', 'Review status updated successfully!');
    }
public function destroy($id)
{
    $review = Review::findOrFail($id);
    $review->delete();

    return redirect()->back()->with('success', 'Review deleted successfully!');
}
}
