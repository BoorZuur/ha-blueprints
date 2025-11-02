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
    public function index(Request $request)
    {
        $query = Blueprint::with(['user', 'category', 'likes']);

        // Apply search filter
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        // Apply category filter
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $blueprints = $query->get();
        $categories = \App\Models\Category::all();

        return view('blueprints.index', compact('blueprints', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if user has given at least 2 likes
        $likesGiven = Auth::user()->likes()->count();

        if ($likesGiven < 2) {
            return redirect()->route('blueprints.index')
                ->with('error', 'You must give at least 2 likes before you can create a blueprint. You have given ' . $likesGiven . ' like(s).');
        }

        $categories = \App\Models\Category::all();
        return view('blueprints.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if user has given at least 2 likes
        $likesGiven = Auth::user()->likes()->count();

        if ($likesGiven < 2) {
            return redirect()->route('blueprints.index')
                ->with('error', 'You must give at least 2 likes before you can create a blueprint. You have given ' . $likesGiven . ' like(s).');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'string', 'url', 'max:255'],
            'category' => ['required', 'exists:categories,id']
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
        $blueprint->load(['user', 'category', 'likes']);

        $isLiked = false;
        if (Auth::check()) {
            $isLiked = $blueprint->isLikedByUser(Auth::id());
        }

        return view('blueprints.show', [
            'blueprint' => $blueprint,
            'username' => $blueprint->user->name,
            'category' => $blueprint->category->name,
            'icon' => $blueprint->category->icon,
            'likesCount' => $blueprint->likesCount(),
            'isLiked' => $isLiked,
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
            'category' => ['required', 'exists:categories,id']
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
