<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use File;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->get();
        return view('admin.gallery.index', compact('gallery'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {

                $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/gallery'), $name);
                $path = 'upload/gallery/' . $name;

                Gallery::create([
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'All images uploaded as individual rows!');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $file = $request->file('image');
            $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/gallery'), $name);
            $path = 'upload/gallery/' . $name;

            $gallery->update([
                'image' => $path
            ]);
        }

        return back()->with('success', 'Gallery image updated successfully!');
    }
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }

        $gallery->delete();

        return back()->with('success', 'Gallery image deleted successfully!');
    }
}
