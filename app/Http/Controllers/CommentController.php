<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        
        $formFields = $request->validate([
          'comment'=>'required',
          'post_id'=>'required'
        ],
        [
          'comment.required'=>'A text is required',
        ]);
  
        $formFields['user_id'] = Auth::user()->id;
        Comment::create($formFields);
        return redirect()->back()->with('message', 'Comment created successfully!');
      }


      public function destroy(Comment $comment){
        if($comment->user_id != Auth::user()->id){
          abort(403, 'Unauthorized Action');
        }
        $comment->delete();
        return redirect()->back()->with('message', 'Comment deleted successfully!');
      }
}
