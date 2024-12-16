<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index() {
        $posts = Posts::orderBy("created_at","desc")->paginate(10);

        return inertia('Posts/Index', compact('posts'));
    }

    public function destroy($id) {
        $post = Posts::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post deleted successfully');
    }

    public function edit($id) {
        $post = Posts::find($id);
        return inertia('Posts/Edit', compact('post'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $post = Posts::find($id);
        $post->update($request->validated());

        return redirect()->route('posts.index')->with('message', 'Post updated successfully');
    }
}
