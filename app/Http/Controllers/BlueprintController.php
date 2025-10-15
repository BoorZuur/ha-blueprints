<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Http\Request;

class BlueprintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blueprints = Blueprint::all();
        return view('blueprints.index', compact('blueprints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('blueprints.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'blueprint' => ['required', 'string'],
            'category' => ['required']
        ]);
        $blueprint = new Blueprint();
        $blueprint->name = $request->input('name');
        $blueprint->description = $request->input('description');
        $blueprint->blueprint = $request->input('blueprint');
        $blueprint->category_id = $request->input('category');
        $blueprint->user_id = auth()->id();
        $blueprint->save();
        return redirect()->route('blueprints.index')->with('success', 'Blueprint created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blueprint $blueprint)
    {
        return view('blueprints.show', compact('blueprint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blueprint $blueprint)
    {
        $categories = \App\Models\Category::all();
        return view('blueprints.edit', compact('blueprint', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blueprint $blueprint)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'blueprint' => ['required', 'string'],
            'category' => ['required']
        ]);
        $blueprint->name = $request->input('name');
        $blueprint->description = $request->input('description');
        $blueprint->blueprint = $request->input('blueprint');
        $blueprint->category_id = $request->input('category');
        $blueprint->save();
        return redirect()->route('blueprints.index')->with('success', 'Blueprint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blueprint $blueprint)
    {
        $blueprint->delete();
        return redirect()->route('blueprints.index')->with('success', 'Blueprint deleted successfully.');
    }
}
