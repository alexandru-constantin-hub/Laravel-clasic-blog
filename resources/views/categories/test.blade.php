<h1>Categories</h1>

{{$categories}}

<ul>
@foreach($categories as $category)
    <li>{{$category['title']}}</li>
@endforeach
</ul>