<?php
use App\Models\Category;
$categories = Category::all();
?>
<x-layout>
<x-admin>
    <form method="POST" action="http://localhost/Laravel/clasic/blog/public/admin/posts/{{$post->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Post title</label>
          <input type="text" class="form-control" id="postTitle" name="title" value={{$post->title}}>
          @error('title')
            <div class="invalid-feedback d-block">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="formContent" class="form-label d-block">Post content</label>
          <textarea class="form-control" id="formContent" rows="10" name="text" value={{$post->text}}></textarea>
          @error('text')
            <div class="invalid-feedback d-block">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-5">
          <select class="form-select" aria-label="Select category" name="category_id" value={{$post->category_id}}>
            <option selected>Select a category</option>
              @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['title']}}</option>
              @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback d-block">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Please upload a image</label>
          <input class="form-control" type="file" id="formFile" name="image" value={{$post->image}}>
          <img src="{{$post->image ? asset('storage/' . $post->image) : ''}}" class="w-25 m-3" alt="">
          @error('image')
            <div class="invalid-feedback d-block">
              {{$message}}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-admin> 
</x-layout>