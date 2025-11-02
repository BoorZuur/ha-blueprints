<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Blueprint $blueprint)
    {
        $user = Auth::user();

        // Check if user has already liked this blueprint
        $existingLike = Like::where('blueprint_id', $blueprint->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingLike) {
            // Unlike - delete the like
            $existingLike->delete();
            $liked = false;
        } else {
            // Like - create a new like
            Like::create([
                'blueprint_id' => $blueprint->id,
                'user_id' => $user->id,
            ]);
            $liked = true;
        }

        // Return the updated like count and liked status
        return response()->json([
            'liked' => $liked,
            'likes_count' => $blueprint->likes()->count(),
        ]);
    }
}

