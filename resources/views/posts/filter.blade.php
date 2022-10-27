<x-layout>

    @foreach($posts as $post)
        <x-card :post="$post" :singular=false :admin=false/>
    @endforeach
    
</x-layout>