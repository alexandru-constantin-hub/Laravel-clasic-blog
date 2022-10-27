<x-layout>
    <form method="POST" action="http://localhost/Laravel/clasic/blog/public/admin/users" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="postTitle" name="name" value="{{old('name')}}">
          @error('name')
            <div class="invalid-feedback d-block">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label d-block">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
          @error('email')
            <div class="invalid-feedback d-block">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label d-block">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
            @error('password')
              <div class="invalid-feedback d-block">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label d-block">Confirm password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
            @error('password_confirmation')
              <div class="invalid-feedback d-block">
                {{$message}}
              </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div class="row">
        <div class="col-12">
          <p>Already have an account?</p>  
          <a href="/admin/login" class="btn btn-primary mt-5">Login</a>
        </div>
      </div>
</x-layout>
