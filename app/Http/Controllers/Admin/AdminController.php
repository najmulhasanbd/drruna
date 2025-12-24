<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
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
