<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Councilor') }}
        </h2>
        
    </x-slot>

   <div class="container">
       @if(!empty($info))
          <div class="alert alert-success mt-2"> {{ $info }}</div>
        @endif

      <div class="row">
        <div class="col-sm-5 col-md-6 mt-3">
          
           <div class="card-header bg-dark text-light">
                <h3>Select Category Section</h3>
            </div>
            <div class="card-body border">
                <form action="{{ url('/cat-post') }}" method="post" enctype="multipart/form-data" id="upload-image">
                   @csrf
                   <div class="form-group">
                    <label for="category">Choose your counselling category</label>
                      <select class="form-control" name="category">
                          <option name="finances">Finances</option>
                          <option name="educational">Educational</option>
                          <option name="religion">Religion</option>
                          <option name="marriage">Marriage</option>
                      </select>
                      <div class="form-group mt-3">
                            <input type="file" class="form-control" name="image" placeholder="Choose image" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-12">
                </div>
                <div>
                      <button class="btn btn-success float-right mt-4">Submit</button>
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



                


               

                           