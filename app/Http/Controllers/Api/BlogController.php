<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::published()->latest();

        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        return $query->paginate(9);
    }

    public function latest()
    {
        return BlogPost::published()
            ->latest()
            ->limit(3)
            ->get();
    }

    public function show($slug)
    {
        return BlogPost::where('slug', $slug)
            ->published()
            ->firstOrFail();
    }

    public function categories()
    {
        return BlogPost::published()
            ->select('category')
            ->distinct()
            ->pluck('category');
    }

    // Admin methods
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = auth()->id();

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blog', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $post = BlogPost::create($validated);

        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'excerpt' => 'sometimes|string|max:500',
            'content' => 'sometimes|string',
            'category' => 'sometimes|string|max:100',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if (isset($validated['is_published']) && $validated['is_published'] && empty($post->published_at)) {
            $validated['published_at'] = now();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blog', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $post->update($validated);

        return $post;
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    // Admin: get all posts including drafts
    public function adminIndex(Request $request)
    {
        $query = BlogPost::latest();

        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        return $query->paginate(15);
    }

    public function adminShow($id)
    {
        return BlogPost::findOrFail($id);
    }
}
