<x-guest-layout>
  
  <div class="container mt-5">
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
                  <h3>Register Here</h3>
              </div>
              
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group first">   
                <input type="text" class="form-control" name="name" :value="old('name')" id="username" placeholder="Username">
                <input type="text" name="email" :value="old('email')" class="form-control mt-2" id="useremail" placeholder="User Email">
              </div>
              <div class="form-group last mb-4">
               
                <input type="password" name="password" placeholder="Password" class="form-control mt-2" id="password">
                 <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control mt-2" id="confirm-password">
                
              </div>
              
               <div class="mt-4">
                    <x-jet-label for="councilor">
                        <div class="flex items-center">
                            <div class="ml-2">
                                {!! __('Register as a councilor', [
                                        'terms_of_service' => ' class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => ' class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>

                             <select name="usertype">
                                <option value="councilee">Councilee</option>
                                <option value="councilor">Councilor</option>
                            </select>
                        </div>
                    </x-jet-label>
                </div>

             <button class="btn text-white btn-block btn-primary">Submit</button>

              <span class="d-block text-left my-4 text-muted"><a href="{{ route('login') }}">Already have an account</a></span>
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

</div>
  
   
</x-guest-layout>
