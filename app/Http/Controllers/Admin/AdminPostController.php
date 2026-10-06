<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /** Admin: paginated list, including filter for trashed */
    public function index(Request $request)
    {
        $query = Post::with('user')->latest();

        // Filter: active / trashed / all
        if ($request->get('filter') === 'trashed') {
            $query->onlyTrashed();
        } elseif ($request->get('filter') === 'all') {
            $query->withTrashed();
        }

        $posts = $query->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /** Admin: create form */
    public function create()
    {
        return view('admin.posts.create');
    }

    /** Admin: store with validation */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'body'   => 'required|string|min:10',
            'status' => 'required|in:pending,published',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title'   => $validated['title'],
            'body'    => $validated['body'],
            'status'  => $validated['status'],
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    /** Admin: edit form */
    public function edit($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /** Admin: update */
    public function update(Request $request, $id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'body'   => 'required|string|min:10',
            'status' => 'required|in:pending,published',
        ]);

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /** Admin: soft delete */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return back()->with('success', 'Post moved to trash. You can restore it later.');
    }

    /** Admin: restore a soft-deleted post */
    public function restore($id)
    {
        Post::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Post restored successfully.');
    }

    /** Admin: permanently delete */
    public function forceDelete($id)
    {
        Post::withTrashed()->findOrFail($id)->forceDelete();

        return back()->with('success', 'Post permanently deleted.');
    }
}