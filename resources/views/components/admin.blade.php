<div class="row">
    <div class="col-3 bg-light vh-100">
        @include('partials._sidebar')
    </div>
    <div class="col-9">
        {{$slot}}
    </div>
</div>    