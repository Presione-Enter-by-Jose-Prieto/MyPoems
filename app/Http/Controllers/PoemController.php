<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poem;

class PoemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poemas = Poem::orderBy('created_at', 'desc')->get();
        return view('poems.index', compact('poemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'dedication' => 'nullable|string|max:255',
            'autor' => 'nullable|string|max:255',
        ]);

        Poem::create($data);
        return redirect()->route('poems.index')->with('success', 'Poem created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poema = Poem::findOrFail($id);
        return view('poems.view', compact('poema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poem $poem)
    {
        $poema = $poem;
        return view('poems.edit', compact('poema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'dedication' => 'nullable|string|max:255',
            'autor' => 'nullable|string|max:255',
        ]);

        $poem = Poem::findOrFail($id);
        $poem->update($data);
        return redirect()->route('poems.show', $poem->id)->with('success', 'Poem updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poem $poem)
    {
        $poem->delete();
        return redirect()->route('poems.index')->with('success', 'Poem deleted successfully');
    }
}
