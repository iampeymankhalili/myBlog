<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('view', 'desc')->take(8)->get();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testPost = new Post();
        //
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'pic_address' => 'required',
        ]);

        $image = $request->file('pic_address');
        $imageName = $testPost->makeImageAddress($image);


        $post = new Post([
            'title' => $request['title'],
            'text' => $request['text'],
            'view' => $request['view'],
            'user_id' => $request['user_id'],
            'pic_address' => $imageName,
        ]);
        $post->save();

        return redirect()->route('Home')->with('success', 'Post successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        //
        $user = $post->user()->get();

        $viewcount = $post->viewPlus();

        $post->update(['view' => $viewcount]);

        return view('post.show')->with(
            [
                'user' => $user[0],
                'post' => $post,
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
//        dd($post->pic_address);
        return view('post.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'pic_address' => 'required',
        ]);

        $image = $request->file('pic_address');
        $imageName = $post->makeImageAddress($image);

        $post->update([
            'title' => $request['title'],
            'text' => $request['text'],
            'view' => $request['view'],
            'user_id' => $request['user_id'],
            'pic_address' => $imageName,
        ]);

        return redirect()->route('Home')->with('success', 'Post successfully Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('Home')->with('warning', 'Post successfully deleted.');
    }

    public function browse(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::paginate('5');
        return view('post.browse', compact('posts'));
    }

    public function popular()
    {
        $posts = Post::orderBy('view', 'desc')->paginate('5');
        return view('post.popular', compact('posts'));
    }

    public function user_post(User $userPost)
    {
        $posts = $userPost->posts()->paginate('5');

        return view('user.show')->with([
            'posts' => $posts,
            'user' => $userPost,
        ]);

    }
}
