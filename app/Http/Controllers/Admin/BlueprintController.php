<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blueprint;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlueprintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blueprints = Blueprint::with(['user', 'category'])->paginate(20);
        return view('admin.blueprints.index', compact('blueprints'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'string', 'url', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        // New blueprints are hidden by default
        $validated['show'] = false;

        Blueprint::create($validated);

        return redirect()->route('admin.blueprints.index')->with('success', 'Blueprint created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.blueprints.create', compact('categories', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blueprint $blueprint)
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.blueprints.edit', compact('blueprint', 'categories', 'users'));
    }

    /**
     * Toggle the show status of the blueprint.
     */
    public function toggleShow(Blueprint $blueprint)
    {
        $blueprint->update([
            'show' => !$blueprint->show
        ]);

        return redirect()->route('admin.blueprints.index')->with('success', 'Blueprint visibility toggled successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blueprint $blueprint)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'string', 'url', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $blueprint->update($validated);

        return redirect()->route('admin.blueprints.index')->with('success', 'Blueprint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blueprint $blueprint)
    {
        $blueprint->delete();

        return redirect()->route('admin.blueprints.index')->with('success', 'Blueprint deleted successfully.');
    }
}

