<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class YoutubeController extends Controller
{
    public function index()
    {
        $youtubes = Youtube::latest()->get();
        return view('admin.youtube.index', compact('youtubes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        // ইউটিউব ভিডিও আইডি বের করা এবং সেভ করা
        Youtube::create([
            'url' => $request->url,
        ]);

        return redirect()->back()->with('success', 'Video added successfully!');
    }

    public function update(Request $request, Youtube $youtube)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $youtube->update([
            'url' => $request->url,
        ]);

        return redirect()->back()->with('success', 'Video updated successfully!');
    }

    public function destroy(Youtube $youtube)
    {
        $youtube->delete();
        return redirect()->back()->with('success', 'Video deleted!');
    }
}
