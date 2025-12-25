<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'department'  => 'required|string|max:255',
            'session' => 'required|string|max:255',
            'logo'    => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $save_url = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path('upload/experience/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }

            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            // Image Intervention Resize (Resize to square for logos)
            $image = Image::read($file);
            $image->cover(300, 300);
            $image->save($destinationPath . $filename);

            $save_url = 'upload/experience/' . $filename;
        }

        Experience::create([
            'name'    => $request->name,
            'department'  => $request->department,
            'session' => $request->session,
            'description' => $request->description,
            'logo'    => $save_url,
        ]);

        return redirect()->route('experience.index')->with('success', 'Experience data saved successfully!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

 public function update(Request $request, Experience $experience)
{
    $request->validate([
        'name'       => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'session'    => 'required|string|max:255',
        'logo'       => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048', // optional on update
    ]);

    // Initial data allocation
    $data = [
        'name'        => $request->name,
        'department'  => $request->department,
        'session'     => $request->session,
        'description' => $request->description,
    ];

    if ($request->hasFile('logo')) {
        // Puron image delete kora
        if ($experience->logo && file_exists(public_path($experience->logo))) {
            unlink(public_path($experience->logo));
        }

        $file = $request->file('logo');
        $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

        // Intervention Image use korle
        $image = Image::read($file);
        $image->cover(300, 300);
        $image->save(public_path('upload/experience/' . $filename));

        $data['logo'] = 'upload/experience/' . $filename;
    }

    $experience->update($data);

    return redirect()->route('experience.index')->with('success', 'Experience updated successfully!');
}

    // public function destroy(Education $education)
    // {
    //     // Image unlink
    //     if ($education->logo && File::exists(public_path($education->logo))) {
    //         File::delete(public_path($education->logo));
    //     }

    //     $education->delete();

    //     return redirect()->back()->with('success', 'Education deleted successfully!');
    // }
}
