<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $posts = Posts::where('user_id', $id)->get();
        return inertia('Users/Show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
