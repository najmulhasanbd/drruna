<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chamber;
use Illuminate\Http\Request;

class ChamberController extends Controller
{
    public function index()
    {
        $chambers = Chamber::latest()->get();
        return view('admin.chamber.index', compact('chambers'));
    }

    public function create()
    {
        return view('admin.chamber.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'required|string|max:255',
        ]);

        Chamber::create($request->all());
        return redirect()->route('chamber.index')->with('success', 'Chamber added successfully!');
    }

    public function edit(Chamber $chamber)
    {
        return view('admin.chamber.edit', compact('chamber'));
    }

    public function update(Request $request, Chamber $chamber)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'required|string|max:255',
        ]);

        $chamber->update($request->all());
        return redirect()->route('chamber.index')->with('success', 'Chamber updated successfully!');
    }

    public function destroy(Chamber $chamber)
    {
        $chamber->delete();
        return redirect()->back()->with('success', 'Chamber deleted successfully!');
    }
}
