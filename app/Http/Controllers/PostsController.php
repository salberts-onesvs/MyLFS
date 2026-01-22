<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')
        ->orderBy('title', 'desc')
        ->simplePaginate(4);
        //->paginate(10);

        return view('posts.index', compact('posts'));
        //$posts = Post::all();
        //$posts = Post::orderby('title','desc')->get();
        //return view('posts.index')->with('posts', $posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
    {
    $this->validate($request, [
    'title' => 'required|string|max:255',
    'body' => 'required',
    'cover_image' => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);


    // Default image
    $fileNameToStore = 'noimage.jpg';

    // Handle file upload (ONLY if present)
    if ($request->hasFile('cover_image')) {
        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        $request->file('cover_image')->storeAs(
            'public/cover_images',
            $fileNameToStore
        );
    }

    // Create Post
    $post = new Post;
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->cover_image = $fileNameToStore;
    $post->user_id = auth()->id();
    $post->save();

    return redirect('/posts')->with('success', 'Post Created');
}




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
{
    return view('posts.show', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
{
    $this->authorize('update', $post);
    return view('posts.edit', compact('post'));
}



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
    ]);

        $post->update($validated);

        return redirect('/dashboard')->with('success', 'Post updated!');
}


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy(Post $post)
{
    $this->authorize('delete', $post);
    $post->delete();

    return redirect()->route('posts.index')
        ->with('success', 'Post deleted!');
}

}
