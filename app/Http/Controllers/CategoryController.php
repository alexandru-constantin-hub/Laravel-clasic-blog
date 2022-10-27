<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {   
        return view('categories.index',[
            'categories'=>Category::all(),
        ]);
    }

    public function destroy(Category $category){
        $category->delete();
        return back()->with('message', 'Category deleted successfully!');
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request){
 
      $formFields = $request->validate([
          'title'=>'required',
        ],
        [
          'title.required'=>'Title is required',
        ]);
  
        Category::create($formFields);
        
        return redirect('/admin/categories')->with('message', 'Category created successfully!');
      }

      public function test(){

        return view('categories.test',[
          'categories'=>Category::all(),
      ]);
      }
}
