<?php $i = 1 ?>
<x-app-layout>
    <x-slot name="header">
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

<div class="container emp-profile">
         <div class="row">
                    <div class="col-md-4">
                       <a class="btn btn-info" href="{{route('counselReq.mine')}}">Back</a>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <div class="card-header">
                                        <h4>Message</h4>
                                    </div>
                                    <div class="card-body border">
                                        {{$counselRequest->request}}
                                    </div>
                                   
                        </div>
                    </div>         
</div>



   
    </div>
</x-app-layout>
 



               