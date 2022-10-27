<x-layout>
    <form method="POST" action="http://localhost/Laravel/clasic/blog/public/admin/users/authenticate" enctype="multipart/form-data">
        @csrf
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div class="row">
        <div class="col-12">
          <p>Don't you have an account?</p>  
          <a href="http://localhost/Laravel/clasic/blog/public/admin/register" class="btn btn-primary mt-5">Register</a>
        </div>
      </div>
</x-layout>
