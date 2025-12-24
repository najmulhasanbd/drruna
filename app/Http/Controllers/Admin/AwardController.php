<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->get();
        return view('admin.award.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.award.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'logo'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $save_url = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path('upload/award/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }

            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            // Image Intervention Resize
            $image = Image::read($file);
            $image->cover(300, 300);
            $image->save($destinationPath . $filename);

            // Shothik path save korun (award folder)
            $save_url = 'upload/award/' . $filename;
        }

        Award::create([
            'name'        => $request->name,
            'description' => $request->description,
            'logo'        => $save_url,
        ]);

        return redirect()->route('award.index')->with('success', 'Award saved successfully!');
    }

    public function edit(Award $award)
    {
        // Variable name Award model onujayi hobe
        return view('admin.award.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('logo')) {
            // Purono image delete logic (Unlink)
            if ($award->logo && File::exists(public_path($award->logo))) {
                File::delete(public_path($award->logo));
            }

            $file = $request->file('logo');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            $image = Image::read($file);
            $image->cover(300, 300);
            $image->save(public_path('upload/award/' . $filename));

            $data['logo'] = 'upload/award/' . $filename;
        }

        $award->update($data);

        return redirect()->route('award.index')->with('success', 'Award updated successfully!');
    }

    public function destroy(Award $award)
    {
        // Full path check kore unlink kora
        if ($award->logo) {
            $imagePath = public_path($award->logo);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $award->delete();

        return redirect()->back()->with('success', 'Award and Image deleted successfully!');
    }
}
