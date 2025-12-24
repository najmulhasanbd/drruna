<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        Faq::insert([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->back()->with('success', 'Faq uploaded successfully!');
    }

    public function update(Request $request, Faq $faq)
{
    $request->validate([
        'question' => 'required',
        'answer' => 'required',
    ]);

    $faq->update([
        'question' => $request->question,
        'answer' => $request->answer,
    ]);

    return redirect()->back()->with('success', 'FAQ updated successfully!');
}

    public function destroy(Faq $Faq)
    {
        $Faq->delete();

        return redirect()->back()->with('success', 'Faq Deleted Successfully!');
    }
}
