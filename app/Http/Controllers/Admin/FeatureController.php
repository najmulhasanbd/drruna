<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();
        return view('admin.feature.index', compact('features'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'number' => 'required',
            'icon' => 'required',
        ]);

        Feature::insert([
            'title' => $request->title,
            'number' => $request->number,
            'icon' => $request->icon,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Featured uploaded successfully!');
    }
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required',
            'number' => 'required',
            'icon' => 'required',
        ]);

        $feature->update([
            'title' => $request->title,
            'number' => $request->number,
            'icon' => $request->icon,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Feature Updated Successfully');
    }

    public function destroy(Feature $featured)
    {
        $featured->delete();

        return redirect()->back()->with('success', 'Feature Deleted Successfully!');
    }
}
