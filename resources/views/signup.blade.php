@include('head')

  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="{{route('register')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            @csrf



            <h2>Register here</h2>

            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="name" name="name" class=" form-control form-control-lg" placeholder="Enter your name" value="{{old('name')}}">
            
            <!-- <label class="form-label" for="form3Example3">Full Name</label> -->
             @error('name')
              <span class="alert-danger mt-1 mb-1">{{ $message }}</span>
              @enderror
        </div>


        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" value="{{old('email')}}"/>
          <!-- <label class="form-label" for="form3Example3">Email address</label> -->
          @error('email')
              <span class="alert-danger mt-1 mb-1">{{ $message }}</span>
              @enderror

        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
          <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter password" />
          <!-- <label class="form-label" for="form3Example4">Password</label> -->
          @error('password')
              <span class="alert-danger mt-1 mb-1">{{ $message }}</span>
              @enderror

        </div>



        <div class="d-flex justify-content-between align-items-center">
          <!-- Checkbox -->
          <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
            <label class="form-check-label" for="form2Example3">
              Remember me
            </label>
          </div>
          <a href="{{url('/forget')}}" class="text-body">Forgot password?</a>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
          <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Signup</button>
          <p class="small fw-bold mt-2 pt-1 mb-0">have an account? <a href="{{url('/login')}}" class="link-danger">Login</a></p>
        </div>

        </form>
      </div>
    </div>
    </div>
   
@include('foot')