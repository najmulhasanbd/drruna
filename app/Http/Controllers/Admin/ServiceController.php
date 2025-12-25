<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }
    public function create()
    {
        return view('admin.service.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:services,title|max:255',
            'description' => 'required',
            'icon' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        Service::create([
            'title'            => $request->title,
            'slug'             => Str::slug($request->title),
            'icon'             => $request->icon,
            'description'      => $request->description,
            'meta_title'       => $request->meta_title ?? $request->title,
            'meta_keywords'    => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        \Illuminate\Support\Facades\Cache::forget('frontend_data');

        return redirect()->route('service.index')->with('success', 'Service uploaded successfully with SEO data!');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|unique:services,title,' . $service->id,
            'description' => 'required',
            'icon' => 'required',
        ]);

        $service->update([
            'title'            => $request->title,
            'slug'             => Str::slug($request->title),
            'description'      => $request->description,
            'icon'             => $request->icon,
            'meta_title'       => $request->meta_title,
            'meta_keywords'    => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        \Illuminate\Support\Facades\Cache::forget('frontend_data');

        return redirect()->route('service.index')->with('success', 'Service Updated Successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        \Illuminate\Support\Facades\Cache::forget('frontend_data');

        return redirect()->back()->with('success', 'Service Deleted Successfully!');
    }
}
