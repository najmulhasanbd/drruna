<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $destinationPath = public_path('upload/sliders/');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }

            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            $image = Image::read($file);

            $image->cover(690, 490);

            $save_path = $destinationPath . $filename;
            $image->save($save_path);

            Slider::insert([
                'image' => 'upload/sliders/' . $filename,
                'created_at' => now(),
            ]);

            \Illuminate\Support\Facades\Cache::forget('frontend_data');

            return redirect()->back()->with('success', 'Slider uploaded successfully!');
        }
    }
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $file = $request->file('image');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $image = Image::read($file);
            $image->cover(690, 490);

            $image->save(public_path('upload/sliders/' . $filename));
            $save_url = 'upload/sliders/' . $filename;

            $slider->update(['image' => $save_url]);
        }

        \Illuminate\Support\Facades\Cache::forget('frontend_data');

        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    public function destroy(Slider $slider)
    {
        
        $imagePath = public_path($slider->image);

        // File check ebong Delete
        if (!empty($slider->image) && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Database theke record delete
        $slider->delete();

        \Illuminate\Support\Facades\Cache::forget('frontend_data');

        return redirect()->back()->with('success', 'Slider and Image Deleted Successfully!');
    }
}
