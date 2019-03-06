@extends('frontend.app-template')
@section('content')
<section id="contact" class="wow ">
    <div class="container box_inter">
    	<div class="col-sm-12">
    		 @if ($message = Session::get('success'))
	          <div class="alert alert-success" >
	                <h5 class="text-center"><strong>{{ $message }}</strong></h5>
	          </div>
	          @endif
    	</div>
    	<div class="col-sm-12" align="right">
    		<div class="row">
    		  <div class="btn btn-primary" ><a style="color: #fff;" href="{{url('/editApplication/'.$application_id)}}">Edit Application</a></div>
	          <div class="btn btn-success"><a style="color: #fff;" href="{{url('/viewApplicationDetails/'.$application_id)}}">View Application</a></div>
	        </div>
    	</div>
  	</div>
</section>

@yield('action-content')
@endsection
