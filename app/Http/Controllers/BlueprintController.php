<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlueprintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blueprints = Blueprint::with(['user', 'category'])->get();
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
            'url' => ['required', 'string', 'url', 'max:255'],
            'category' => ['required']
        ]);
        $blueprint = new Blueprint();
        $blueprint->name = $request->input('name');
        $blueprint->description = $request->input('description');
        $blueprint->url = $request->input('url');
        $blueprint->category_id = $request->input('category');
        $blueprint->user_id = Auth::id();
        $blueprint->save();
        return redirect()->route('dashboard')->with('success', 'Blueprint created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blueprint $blueprint)
    {
        $blueprint->load(['user', 'category']);
        return view('blueprints.show', [
            'blueprint' => $blueprint,
            'username' => $blueprint->user->name,
            'category' => $blueprint->category->name,
            'icon' => $blueprint->category->icon,
        ]);
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
            'url' => ['required', 'string', 'url', 'max:255'],
            'category' => ['required']
        ]);
        $blueprint->name = $request->input('name');
        $blueprint->description = $request->input('description');
        $blueprint->url = $request->input('url');
        $blueprint->category_id = $request->input('category');
        $blueprint->save();
        return redirect()->route('dashboard')->with('success', 'Blueprint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blueprint $blueprint)
    {
        $blueprint->delete();
        return redirect()->route('dashboard')->with('success', 'Blueprint deleted successfully.');
    }
}
