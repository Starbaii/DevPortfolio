<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /** Public: paginated list of published posts */
    public function index()
    {
        $posts = Post::published()
            ->with('user')           // eager load to prevent N+1
            ->latest()
            ->paginate(6);           // 6 posts per page
        return view('posts.index', compact('posts'));
    }

    /** Public: single post */
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /** User: submit form */
    public function create()
    {
        return view('posts.create');
    }

    /** User: store */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string|min:10',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title'   => $validated['title'],
            'body'    => $validated['body'],
            'status'  => 'pending',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Post submitted! Awaiting admin approval.');
    }
}