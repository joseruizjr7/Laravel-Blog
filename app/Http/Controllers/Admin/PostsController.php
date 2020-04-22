<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts,
            'now' => $now,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // The function uses the $user to authorization
    public function create(User $user)
    {
        

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        //return $request->all();
        $post = new Post;
        $post->title = $request->get('title');
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        if ($request->published_at == null) {
            $post->published_at = null;
        } else {
            $post->published_at = Carbon::parse($request->get('published_at'));
        }
        
        
        $post->category_id = $request->get('category_id');
        $post->url = Str::slug($request->get('title'), '_');
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido creada!');
    } */

    // The function uses the $user to authorization
    public function store(Request $request)
    {
        
        

        $this->validate($request, ['title' => 'required']);

        $post = new Post;
        $post->title = $request->get('title');
        $post->user_id = auth()->user()->id;
        $post->url = Str::slug($request->title, '_') . '_' . rand(1, 100);
        $post->save();

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        return view('admin.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'categories' => $categories,
            'tags' => $tags,
            'post' => $post,
        ]);
        //return view('admin.posts.edit', [
        //    'post' => $post,
        //]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        // return $request->all();
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        if ($request->published_at == null) {
            $post->published_at = null;
        } else {
            $post->published_at = Carbon::parse($request->get('published_at'));
        }
        $post->category_id = Category::find($cat = $request->get('category_id')) ? $cat : Category::create(['name' => $cat, 'url' => Str::slug($cat)])->id;
        $post->url = Str::slug($request->get('title'), '_') . '_' . rand(1, 100);
        $post->save();

        $tags = [];

        foreach ($request->get('tags') as $tag) {
            $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag, 'url' => Str::slug($tag)])->id;
        }

        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada');
    }
}
