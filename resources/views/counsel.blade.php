<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Cousnsel Request</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('counsel/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/counsel/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('counsel/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('counsel/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('counsel/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('counsel/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('counsel/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('counsel/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

<x-app-layout>
	<div class="contact1">
		<div class="container-contact1">
			
			<div class="contact1-pic js-tilt" data-tilt>
				<div>
					<a class="btn btn-info" href="{{ route('counselReq.mine') }}">Back</a>
				</div>
				<img src="{{ asset('counsel/images/img-01.png') }}" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="{{ route('counselReq.store') }}" method="post">
				@csrf
				<span class="contact1-form-title">
					Create Cousnel Request
				</span>
							 @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
              </div>
              @endif
				     @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
          <div class="wrap-input1 validate-input" data-validate = "Message is required">
          	<input type="hidden" name="counsellee_id" value="{{ $counselles->id }}">
          	<label>Choose a category</label>
						<select class="input1 form-control" name="category_id">
							@foreach($categories as $value)

								<option value="{{ $value->id }}">{{ $value->category }}</option>

							@endforeach
						</select>
					</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Send Message
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>




<!--===============================================================================================-->
	<script src="{{ asset('counsel/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('counsel/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('counsel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('counsel/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('counsel/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="{{ asset('counsel/js/main.js') }}"></script>

</body>
</html>
