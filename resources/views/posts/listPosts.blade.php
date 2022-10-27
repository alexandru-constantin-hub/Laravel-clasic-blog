<x-layout>
    <x-admin>
        @if(count($posts) < 1)
            <p>No posts yet. Please write a post.</p>
        @else
            @foreach($posts as $post) 
                <x-card :post="$post" :singular=false :admin=true/>
            @endforeach
        @endif
    </x-admin>
</x-layout>