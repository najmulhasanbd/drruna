<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $processes = Process::orderBy('position', 'asc')->get();
        return view('admin.process.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.process.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Process::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('process.index')->with('success', 'Process added successfully!');
    }

    public function edit(Process $process)
    {
        return view('admin.process.edit', compact('process'));
    }

    public function update(Request $request, Process $process)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $process->update($request->all());
        return redirect()->route('process.index')->with('success', 'Process updated successfully!');
    }

    public function destroy(Process $process)
    {
        $process->delete();
        return redirect()->back()->with('success', 'Process deleted successfully!');
    }

    public function updateOrder(Request $request)
    {
        $posts = Process::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['position' => $order['position']]);
                }
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Order Updated Successfully']);
    }
}
