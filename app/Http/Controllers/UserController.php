<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(User $user){
        $users = User::find($user->id);
        $user_id = Auth::id();
        $posts = Post::where('user_id', $users->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show',['users'=>$users, 'posts'=>$posts, 'user_id'=>$user_id]);
    }
}
