<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Councilor') }}
        </h2>
        
    </x-slot>

   <div class="container">
       @if(!empty($info))
          <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $info }}</strong>
        </div>
        @endif

      <div class="row">
        <div class="col-sm-5 col-md-6 mt-3">
          
           <div class="card-header bg-dark text-light">
                <h3>Select Category Section</h3>
            </div>
            <div class="card-body border">
                 <form action="{{ url('/cat-post') }}" method="post">
                   @csrf
                   <div class="form-group">
                    <label for="category">Choose your counselling category</label>
                      <input type="text" name="category" class="form-control">
                       @if($errors->has('category'))
                            <div class="error text-danger">{{ $errors->first('category') }}</div>
                        @endif
                      <button class="btn btn-success float-right mt-4">Submit</button>
                      <div class="col-md-12">

                </div>

                   </div> 
                </form>
            </div>
            <div class="card-footer">
                Thanks for using our services
            </div>
    
        </div>
      </div>
</div>
</x-app-layout>



                


               

                           