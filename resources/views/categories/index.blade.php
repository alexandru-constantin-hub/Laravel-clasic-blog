<x-layout>
    <x-admin>
        <h6>Categories</h6>
        <ul>
        @foreach($categories as $category)
            <li>{{$category['title']}}
                <form action="http://localhost/Laravel/clasic/blog/public/admin/categories/{{$category['id']}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>

        @endforeach
        </ul>
    </x-admin>   
</x-layout>