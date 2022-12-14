<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['user','tag'])->orderBy('created_at', 'desc')->paginate(10);
        $tags = Tag::all();
        $user = Auth::user();
        return view('index', ['posts'=>$posts, 'user'=>$user,'tags'=>$tags]);
    }

    public function post(PostRequest $request, Post $post){
        $post->user_id = Auth::id();
        $form = $request->all();
        $form['user_id'] = Auth::id();
        Post::create($form);
        return redirect ('/');
    }
    
    public function show()
    {   $tags = Tag::all();
        return view('search', ['input' => '','category' => '','tags' => $tags]);
    }

    public function search(Request $request)
    {
        $tags = Tag::all();
        $user = Auth::user();
        $posts = Post::where('content', 'LIKE BINARY',"%{$request->input}%")
        ->orwhere('title', 'LIKE BINARY',"%{$request->input}%")
        ->orderBy('created_at', 'desc')
        ->get();
        $param = [
            'input' => $request->input,
            'posts' => $posts
        ];
        return view('search', $param,['tags' => $tags, 'user' => $user]);
    }
    public function delete($id){
        $post = post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }
}
