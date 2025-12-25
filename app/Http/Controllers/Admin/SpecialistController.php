<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        $lastPosition = Specialist::max('position') ?? 0;

        Specialist::create([
            'name' => $request->name,
            'position' => $lastPosition + 1,
        ]);


        \Illuminate\Support\Facades\Cache::forget('frontend_data');

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

        \Illuminate\Support\Facades\Cache::forget('frontend_data');


        return redirect()->route('specialist.index')->with('success', 'Specialist updated successfully!');
    }

    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        \Illuminate\Support\Facades\Cache::forget('frontend_data');

        
        return redirect()->back()->with('success', 'Specialist deleted successfully!');
    }
    public function updateOrder(Request $request)
    {
        if ($request->has('order')) {
            foreach ($request->order as $item) {
                Specialist::where('id', $item['id'])->update([
                    'position' => $item['position'],
                ]);
            }
            return response()->json(['status' => 'success', 'message' => 'Order Updated Successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'No order data found'], 400);
    }
}
