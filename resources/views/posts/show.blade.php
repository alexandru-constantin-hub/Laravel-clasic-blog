<?php use App\Models\Comment; ?>

<x-layout>

@foreach($post as $pos)
    <x-card :post="$pos" :singular=true :admin=false/>
    <?php

$comments = Comment::all()->where('post_id', $pos['id']);
?>
<ul>
    @foreach($comments as $comment)
        <li>{{$comment['comment']}}<span>
        @if($comment['user_id'] == Auth::id())
            <form action="http://localhost/Laravel/clasic/blog/public/admin/comments/{{$comment['id']}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        @endif
        </span>
        </li>
    @endforeach
</ul>
@auth
<x-comment :post_id="$pos['id']" />
@endauth
@endforeach

</x-layout>