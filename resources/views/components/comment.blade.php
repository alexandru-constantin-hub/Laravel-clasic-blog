@props(['post_id'])
<form method="POST" action="http://localhost/Laravel/clasic/blog/public/admin/comments" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Comment</label>
      <input type="text" class="form-control" id="comment" name="comment">
      @error('comment')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
      @enderror
      <input type="hidden" name="post_id" value="{{$post_id}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>