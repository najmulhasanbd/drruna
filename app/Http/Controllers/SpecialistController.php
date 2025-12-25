<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::orderBy('position', 'asc')->get();
        return view('admin.specialist.index', compact('specialists'));
    }

    public function create()
    {
        return view('admin.specialist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Specialist::create([
            'name' => $request->name,
        ]);

        return redirect()->route('specialist.index')->with('success', 'Specialist added successfully!');
    }

    public function edit(Specialist $specialist)
    {
        return view('admin.specialist.edit', compact('specialist'));
    }

    public function update(Request $request, Specialist $specialist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $specialist->update($request->all());
        return redirect()->route('specialist.index')->with('success', 'Specialist updated successfully!');
    }

    public function destroy(Specialist $specialist)
    {
        $specialist->delete();
        return redirect()->back()->with('success', 'Specialist deleted successfully!');
    }

    public function updateOrder(Request $request)
    {
        $Specialists = Specialist::all();

        foreach ($Specialists as $specialist) {
            foreach ($request->order as $order) {
                if ($order['id'] == $specialist->id) {
                    $specialist->update(['position' => $order['position']]);
                }
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Specialist Order Updated Successfully']);
    }
}
