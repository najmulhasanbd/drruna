<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);

        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Service uploaded successfully!');
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Service Updated Successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back()->with('success', 'Service Deleted Successfully!');
    }
}
