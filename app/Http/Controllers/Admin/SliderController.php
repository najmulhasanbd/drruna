<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\File; // <--- Ei line-ti miss hoyeche
use Intervention\Image\Laravel\Facades\Image; // Image-er jonno
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

            $image->cover(690, 690);

            $save_path = $destinationPath . $filename;
            $image->save($save_path);

            Slider::insert([
                'image' => 'upload/sliders/' . $filename,
                'created_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Slider uploaded successfully!');
        }
    }
    public function update(Request $request, Slider $slider)
    {
        // Validation
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // 1. Puron image delete kora
            if (File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            // 2. Notun image process (Intervention v3)
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $image = Image::read($file);
            $image->cover(690, 690);

            $image->save(public_path('upload/sliders/' . $filename));
            $save_url = 'upload/sliders/' . $filename;

            // 3. Database update with new image
            $slider->update(['image' => $save_url]);
        }

        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    public function destroy(Slider $slider)
    {
        // 1. Database-e save thaka image path-ti check kora
        $imagePath = public_path($slider->image);

        // 2. Server-er folder-e image-ti thakle seta delete/unlink kora
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // 3. Database theke record-ti delete kora
        $slider->delete();

        return redirect()->back()->with('success', 'Slider and Image Deleted Successfully!');
    }
}
