<x-layout>

@foreach($posts as $post)
    <x-card :post="$post" :singular=false :admin=false />
@endforeach

<div>
    {{$posts->links()}}
</div>    

</x-layout>