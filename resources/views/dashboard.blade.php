<?php $i = 1 ?>
<x-app-layout>
    <x-slot name="header">
         {{auth()->user()->usertype}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

      @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif

    <div class="container">
            <div class="card-header bg-dark text-light mt-5">
                <h3>List of all counsellors</h3>
            </div>

            <div class="container">
                <div class="row">
            @foreach($counsellors as $counsellor)
                <div class="col-4">
                  <div class="card mt-3" style="width: 18rem;">
                  <img src="images/{{ $counsellor->imgpath }}" class="card-img-top" alt="..." style="width: 100%; height: 150px;">
                  <div class="card-body">
                    <div class="card-text">
                        <h3 style="font-weight: bold;">Name:{{ $counsellor->username }}</h3><br>
                        <h3 style="font-weight: bold;">Category:{{ $counsellor->category }}</h3><br>
                        <form action="{{ route('/book-session') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $counsellor->user_id }}">
                            <button class="btn btn-info">Book Session</button>
                        </form>
                    </div>
                  </div>
                </div>
                </div>  
            @endforeach
            </div>
            </div>
            
    </div>
</x-app-layout>
 



               