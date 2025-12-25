<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
   public function index()
    {
        $experiences = Experience::latest()->get();
        return view('admin.experience.index', compact('experiences'));
    }

    // public function create()
    // {
    //     return view('admin.experience.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'    => 'required|string|max:255',
    //         'degree'  => 'required|string|max:255',
    //         'session' => 'required|string|max:255',
    //         'logo'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $save_url = null;

    //     if ($request->hasFile('logo')) {
    //         $file = $request->file('logo');
    //         $destinationPath = public_path('upload/education/');

    //         if (!File::exists($destinationPath)) {
    //             File::makeDirectory($destinationPath, 0777, true);
    //         }

    //         $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

    //         // Image Intervention Resize (Resize to square for logos)
    //         $image = Image::read($file);
    //         $image->cover(300, 300);
    //         $image->save($destinationPath . $filename);

    //         $save_url = 'upload/education/' . $filename;
    //     }

    //     Education::create([
    //         'name'    => $request->name,
    //         'degree'  => $request->degree,
    //         'session' => $request->session,
    //         'logo'    => $save_url,
    //     ]);

    //     return redirect()->route('education.index')->with('success', 'Education data saved successfully!');
    // }

    // public function edit(Education $education)
    // {
    //     return view('admin.education.edit', compact('education'));
    // }

    // public function update(Request $request, Education $education)
    // {
    //     $request->validate([
    //         'name'    => 'required|string|max:255',
    //         'degree'  => 'required|string|max:255',
    //         'session' => 'required|string|max:255',
    //         'logo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $data = [
    //         'name'    => $request->name,
    //         'degree'  => $request->degree,
    //         'session' => $request->session,
    //     ];

    //     if ($request->hasFile('logo')) {
    //         // Puron image delete (Unlink)
    //         if ($education->logo && File::exists(public_path($education->logo))) {
    //             File::delete(public_path($education->logo));
    //         }

    //         $file = $request->file('logo');
    //         $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

    //         $image = Image::read($file);
    //         $image->cover(300, 300);
    //         $image->save(public_path('upload/education/' . $filename));

    //         $data['logo'] = 'upload/education/' . $filename;
    //     }

    //     $education->update($data);

    //     return redirect()->route('education.index')->with('success', 'Education updated successfully!');
    // }

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
