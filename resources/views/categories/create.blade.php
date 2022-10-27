<x-layout>
    <x-admin>
        <form method="POST" action="http://localhost/Laravel/clasic/blog/public/categories">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Category title</label>
              <input type="text" class="form-control" id="categoryTitle" name="title">
              @error('title')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Description</label>
              <input type="text" class="form-control" id="categoryDescription" name="description">
              @error('description')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-admin>
</x-layout>