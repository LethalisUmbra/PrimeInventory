<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    public function index()
    {
        return view('home', [
            'posts' => Post::latest('created_at')->paginate(),
            'carousel' => Post::latest('created_at')->take(2)->get()
        ]);
    }

    public function create()
    {
        return view('post.create', ['post' => new Post]);
    }

    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $name = $request->file->getClientOriginalName();

            $request->file->storeAs('public/post/', $name);

            $post = new Post([
                "title" => $request->get('title'),
                "url" => Str::slug($request->get('title')),
                "description" => $request->get('description'),
                "image_path" => $name
            ]);
            $post->save();
        }

        return redirect()->route('home')->with('status', __('The post was created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show ', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
        return view('post.edit ', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request){
        // Validate the inputs
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->url = Str::slug($request->get('title'));
        $post->description = $request->get('description');

        if ($request->hasFile('file'))
        {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $old_image = $post->image_path;

            Storage::delete('public/post/' . $post->image_path);

            $name = $request->file->getClientOriginalName();

            $request->file->storeAs('public/post/', $name);

            $post->image_path = $name;
        }

        $post->save();

        return redirect()->route('post.show', $post)->with('status', __('The post was successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post){
        Storage::delete('public/post/' . $post->image_path);
        $post->delete();
        return redirect()->route('home')->with('status', __('The post was successfully deleted'));
    }
}
