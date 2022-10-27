<?php
use App\Models\Category;
$categories = Category::all();
?>

<nav class="navbar navbar-expand-lg bg-light mb-5">
    <a class="navbar-brand" href="#">BLOG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page"
                    href="http://localhost/Laravel/clasic/blog/public/">Home</a>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                </a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                        <li><a class="dropdown-item" href="http://localhost/Laravel/clasic/blog/public/posts/categories/{{$category['id']}}">{{$category['title']}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <form class="d-flex me-5" role="search" action="posts" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="post" required>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        @auth
        <div class="d-flex">
            <p class="d-block mt-auto mb-auto">Welcome, {{auth()->user()->name}}</p>
            <a type="button" class="btn btn-outline-secondary ms-2" href="http://localhost/Laravel/clasic/blog/public/admin">Administration</a>
            <form method="POST" action="http://localhost/Laravel/clasic/blog/public/admin/logout">
                @csrf
                <button class="btn btn-outline-primary ms-2" type="submit">Logout</button>
            </form>    
        </div>
        @else
        <div class="d-flex">
            <a type="button" class="btn btn-outline-secondary" href="http://localhost/Laravel/clasic/blog/public/admin/login">Login</a>
            <a type="button" class="btn btn-outline-primary ms-2" href="http://localhost/Laravel/clasic/blog/public/admin/register">Register</a>
        </div>
        @endauth    
    </div>
</nav>
