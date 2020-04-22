<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $posts = $tag->posts()->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at')
            ->paginate(5);

        $recentPosts = Post::whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at')
            ->where('category_id', '!=', null)
            ->limit(3)->get();

        return view('blog', [
            'posts' => $posts,
            'tags' => $tags,
            'categories' => $categories,
            'recentPosts' => $recentPosts
        ]);

        return view('blog', [
            'posts' => $posts,
            'tags' => $tags,
            'categories' => $categories,
            'recentPosts' => $recentPosts
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
