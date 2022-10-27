<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class postController extends Controller
{
    public function index()
    {   
        return view('welcome',[
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->paginate(5, array('posts.*', 'categories.title as category_title')),
        ]);
    }

    public function filter(){
        return view('posts.filter',[
            'posts'=>Post::latest()->filter(request(['post']))->get(),
        ]);
    }
    
    public function show($post)
    {
        return view('posts.show', [
            'post'=>Post::join('categories', 'posts.category_id', '=', 'categories.id')->where('posts.id', '=', $post)->get(['posts.*', 'categories.title as category_title'],)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function list(){
        return view('posts.listPosts',[
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->where('posts.user_id', Auth::user()->id)->get(['posts.*', 'categories.title as category_title']),
        ]);
    }

    public function store(Request $request){
      $formFields = $request->validate([
        'title'=>'required',
        'text'=>'required',
        'category_id'=>'required|integer',
        'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image.image'=>'File must be an image',
        'image.mimes'=>'File must be jpeg, png, jpg, gif, svg',
        'image.max'=>'File must be less than 2MB',
      ],
      [
        'title.required'=>'Title is required',
        'text.required'=>'Text is required',
        'category_id.integer'=>'Category must be selected',
      ]);

      if($request->hasFile('image')){
        $formFields['image'] = $request->file('image')->store('images', 'public');
      }

      $formFields['user_id'] = Auth::user()->id;
     
      Post::create($formFields);
      return redirect('/admin/posts')->with('message', 'Post created successfully!');
    }

    public function edit(Post $post) {
        return view('posts.edit', [
            'post'=>$post,
        ]);
    }


    public function update(Request $request, Post $post){
      if($post->user_id != Auth::user()->id){
        abort(403, 'Unauthorized Action');
      }

        $formFields = $request->validate([
          'title'=>'required',
          'text'=>'required',
          'category_id'=>'required|integer',
          'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'image.image'=>'File must be an image',
          'image.mimes'=>'File must be jpeg, png, jpg, gif, svg',
          'image.max'=>'File must be less than 2MB',
        ],
        [
          'title.required'=>'Title is required',
          'text.required'=>'Text is required',
          'category_id.integer'=>'Category must be selected',
        ]);
  
        if($request->hasFile('image')){
          $formFields['image'] = $request->file('image')->store('images', 'public');
        }
       
        $post->update($formFields);
        return back()->with('message', 'Post update successfully!');
      }


      public function destroy(Post $post){
        if($post->user_id != Auth::user()->id){
          abort(403, 'Unauthorized Action');
        };
        $post->delete();
        return redirect('/admin/posts')->with('message', 'Post deleted successfully!');
      }
    
  
}