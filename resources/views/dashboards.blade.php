


<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Counsel Requests in your Counselling Category') }}
            </h2>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(Auth::user()->usertype == "councilee")
                <a href="{{ route('counsel.request') }}">{{ __('Create counsel request') }}</a>
                @endif
            </h2>
            </div>
    </x-slot>

        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
         @if ($message = Session::get('fail'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
         @if ($message = Session::get('established'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
         @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

<div class="container bootstrap snippets bootdeys">

@if(Auth::user()->usertype == "councilee")
<div class="row">
    @foreach($counselRequest as $counsel)
    <div class="col-md-4 col-sm-6 content-card">
        <div class="card-big-shadow">
            <div class="card card-just-text" data-background="color" data-color="blue" data-radius="none">
                <div class="content">
                    <h6 class="category"></h6>
                    <p>{{ $counsel->request}}</p>
                    <a class="btn btn-info form-control mb-2 mt-2" href="{{route('counselReq.single', ['id' => $counsel->id])}}">View</a>

                    <form method="post" action="{{ route('counselReq.delete', ['id' => $counsel->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger form-control">Delete</button>
                    </form>

                </div>
            </div> <!-- end card -->
        </div>
    </div>
    @endforeach
</div>
@else

    @if(is_null($counselRequest))
        <div class="container">
             <div class="container mt-5">
                    <div class="card-body">
                        <h3>No counsel request related to your category</h3>
                </div>
            </div>
        </div>
    @else
    <div class="row">
    @foreach($counselRequest as $counsel)
    <div class="col-md-4 col-sm-6 content-card">
        <div class="card-big-shadow">
            <div class="card card-just-text" data-background="color" data-color="white" data-radius="none">
                <div class="content">
                    <h6 class="category"></h6>
                    <p style="color: black;">{{ $counsel->request }}</p>
                    <button class="btn-xm btn-success">{{$counsel->category->category}}</button>
                   <form method="post" action="{{ route('establish.chat')}}">
                    <br>
                    <br>
                    @csrf
                        <input type="hidden" name="counsellee_id" value="{{ $counsel->consellee_id }}">
                         @if (Session::get('established'))
                         <button class="btn btn-info form-control mb-2 mt-2">Chat with Counsellee</button>
                         @else
                        <a href="{{route('view.chat')}}" class="btn btn-info orm-control">Chat Ongoing..</a>
                        @endif
                   </form>

                </div>
            </div> <!-- end card -->
        </div>
    </div>
    @endforeach
</div>
@endif
@endif


</div>

</x-app-layout>
