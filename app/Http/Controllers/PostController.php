<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        if(Auth::id() != 1){
            $posts = Post::scopePosts(Auth::id());
        }
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\View|
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $create = Post::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return back()->withStatus(__('Post successfully created.'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $post = Post::find($id);
        $post->get();
        return view('posts.show', compact('post'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $post = Post::find($id);
        $post->get();
        return view('posts.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, int $id)
    {
        $post = Post::find($id);
        $data = $request->all();

        $post->update([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return back()->withStatus(__('Post successfully updated.'));
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->withStatus(__('Post successfully deleted.'));
    }
}
