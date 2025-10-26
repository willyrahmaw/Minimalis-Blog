<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('published', true);
        
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }
        $settings = Settings::first();
        $posts = $query->latest()->paginate(10);
        return view('blog.index', compact('posts', 'settings'));
    }

    public function show($slug)
    {
        $settings = Settings::first();
        $post = Post::where('slug', $slug)->where('published', true)->first();
        if (!$post) {
            return view('errors.404');
        }
        
        // Increment views
        $post->increment('views');
        
        return view('blog.show', compact('post', 'settings'));
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->latest()->paginate(10);
        return view('admin.dashboard', compact('user_id', 'posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
            'published' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = Auth::user()->id;
        Post::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        // Check if user owns this post
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Check if user owns this post
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
            'published' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $post->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Check if user owns this post
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully!');
    }
}
