<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Post::with('category', 'tags')->paginate(2);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);

        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Статья добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        $post = Post::find($id);

        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Статья обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $post = Post::find($id);

        $post->tags()->sync([]);

        Storage::delete($post->thumbnail);

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Статья удалена');
    }
}
