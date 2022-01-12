<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Councilor') }}
        </h2>
        
    </x-slot>

   <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif

      <div class="row">
        <div class="col-sm-5 col-md-6 mt-3">
          
           @if($category == null)
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

                      <button class="btn btn-success float-right mt-4">Submit</button>
                   </div> 
                </form>
            </div>
            <div class="card-footer">
                Thanks for using our services
            </div>
            @else
                <div class="card-header">
                   <h3> Category Status</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex;">
                        <img src="images/{{ $category->imgpath }}" width ="100px">
                        <h1 style="margin-top: 50px; margin-left: 5px; font-weight: bold;">{{$category->category}}</h1>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-info" href="{{url('update')}}">Change Your Category Here</a>
                </div>
            @endif
            
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 mt-3">
             <div class="card-header bg-dark text-light">
                <h3>List of all counsel requests</h3>
            </div>
             <div class="card-body border">
               
              @if($bookings !== null)
              @foreach($bookings as $booking)
                {{$booking->username}}
              @endforeach
              @else
              No bookings available
              @endif

               
            </div>
        </div>
      </div>
</div>
</x-app-layout>
