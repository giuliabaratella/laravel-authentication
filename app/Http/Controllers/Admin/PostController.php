<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $form_data = $request->validated();
        // creo slug
        $slug = Str::slug($form_data['title'], '-');
        // aggiungo slug ai dati validati
        $form_data['slug'] = $slug;

        // prendere id dell'autore del post (utente loggato)
        $userId = auth()->user();
        $form_data['user_id'] = $userId;

        // oppure
        // $userId = Auth::id();


        $newPost = Post::create($form_data);

        return to_route('admin.posts.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->validated();

        $slug = Str::slug($form_data['title'], '-');

        $form_data['slug'] = $slug;

        $form_data['user_id'] = $post->user_id;



        $post->update($form_data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', "il post '$post->title' è stato eliminato");

    }
}
