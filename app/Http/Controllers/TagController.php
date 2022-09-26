<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index(Tag $tag){
        $tags = Tag::find($tag->id);
        $categories = Tag::all();
        $posts = Post::where('tag_id', $tags->id)->paginate(10);
        return view('tags.index',['tags'=>$tags, 'posts'=>$posts, 'categories'=>$categories]);
    }
}
