<x-guest-layout>
   
  <div class="container mt-5" style="margin-top: 100px;">
    <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="{{ asset('auth/images/undraw_file_sync_ot38.svg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <div class="card-header">
                  <h3>Login Here</h3>
              </div>
            </div>
               @if ($message = Session::get('failed'))
              <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
              </div>
              @endif
              <x-jet-validation-errors class="mb-4" />
              
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group first">   
               
                <input type="text" name="email" :value="old('email')" class="form-control mt-2" id="useremail" placeholder="User Email">
              </div>
              <div class="form-group last mb-4">
               
                <input type="password" name="password" placeholder="Password" class="form-control mt-2" id="password">
                
              </div>
              

              <button class="btn text-white btn-block btn-primary">Login</button>

              <span class="d-block text-left my-4 text-muted"><a href="{{ route('register') }}">Dont have an account</a></span>
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

    </div>
  
</x-guest-layout>
