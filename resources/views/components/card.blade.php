@props(['post','singular','admin'])

<x-card-wrapper>
    <img src="{{$post->image ? asset('storage/' . $post->image) : ''}}" class="card-img-top w-25 m-3" alt="">
    <div class="card-body">
    <h5 class="{{$post['title']}}">{{$post['title']}}</h5>
    <h6 class="card-subtitle mb-2 text-muted w-100">Category: <a href="http://localhost/Laravel/clasic/blog/public/posts/categories/{{$post['category_id']}}">{{$post['category_title']}}</a>
        <span>Post on: {{date('d-m-Y', strtotime($post['created_at']))}}</span>
    </h6>
    
    <p class="card-text">
        @if($singular==true)
            {{$post['text']}}
            @else
            {{Str::limit($post['text'], 100)}}
        @endif
    </p>
    @if($singular==true)
        <a href="http://localhost/Laravel/clasic/blog/public" class="card-link">Home</a>
        @else
        <a href="http://localhost/Laravel/clasic/blog/public/posts/{{$post['id']}}" class="card-link">Post</a>
    @endif
    </div>
    @if($admin==true)
    <div class="card-footer">
        <a href="http://localhost/Laravel/clasic/blog/public/admin/posts/{{$post['id']}}/edit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
          </svg>Edit</a>
        <form action="http://localhost/Laravel/clasic/blog/public/admin/posts/{{$post['id']}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>Delete</button>
        </form>
    </div>
    @endif
</x-card-wrapper>