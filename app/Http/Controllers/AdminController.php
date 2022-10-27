<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'post_count'=>Post::all()->where('user_id', Auth::user()->id)->count(),
            'comment_count'=>Comment::where('user_id', Auth::user()->id)->count(),
        ]);
    }
}
