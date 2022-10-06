<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::select('id', 'label')->get();
        $tags = Tag::select('id', 'label')->get();
        $tags_ids = [];
        return view('admin.posts.create', compact('post', 'categories', 'tags', 'tags_ids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|min:5|max:50',
                'content' => 'required|string',
                'image' => 'nullable|url',
                'category_id' => 'nullable|exists:categories,id'
            ],
            [
                'title.required' => 'Devi inserire il titolo',
                'title.min' => 'il titolo deve essere minimo :min caratteri',
                'title.max' => 'il titolo deve essere massimo :max caratteri',
                'content.required' => 'Devi inserire il contenuto',
                'image.url' => 'l\'url immagine non è valido',
                'category_id.exists' => 'non esiste una categoria assosiabile'
            ]
        );

        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->user_id = Auth::id();
        $post->save();
        $post->tags()->attach($data['tag']);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::select('id', 'label')->get();
        $tags = Tag::select('id', 'label')->get();
        $tags_ids = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'tags_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required|string|min:5|max:50',
                'content' => 'required|string',
                'image' => 'nullable|url',
                'category_id' => 'nullable|exists:categories,id'
            ],
            [
                'title.required' => 'Devi inserire il titolo',
                'title.min' => 'il titolo deve essere minimo :min caratteri',
                'title.max' => 'il titolo deve essere massimo :max caratteri',
                'content.required' => 'Devi inserire il contenuto',
                'image.url' => 'l\'url immagine non è valido',
                'category_id.exists' => 'non esiste una categoria assosiabile'
            ]
        );

        $data = $request->all();
        $post->slug = Str::slug($data['title'], '-');
        $post->update($data);
        $post->save();
        $post->tags()->sync($data['tag']);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
