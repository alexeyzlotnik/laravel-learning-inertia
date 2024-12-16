<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostsResource;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index() {
        $posts = Posts::with('user')
            ->orderBy("created_at", "desc")
            ->paginate(10);

        return inertia('Posts/Index', [
            'posts' => PostsResource::collection($posts)
        ]);
    }

    public function destroy($id) {
        $post = Posts::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post deleted successfully');
    }

    public function edit($id) {
        $post = Posts::with('user')->find($id);
        $users = User::all();
        return inertia('Posts/Edit', compact('post', 'users'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $post = Posts::find($id);
        $post->update($request->validated());

        return redirect()->route('posts.index')->with('message', 'Post updated successfully');
    }
}
