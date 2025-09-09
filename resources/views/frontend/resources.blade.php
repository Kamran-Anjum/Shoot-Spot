@extends('layout.frontendLayout.design')
@section('content')
	
<section style="padding: 70px;">
	<div class="container">

		<h2  class="title text-left">Resources</h2>
		<br>
		<br>
		<div class="row text-center">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/r1.png') }}">
				<h4 style="padding: 20px;">Product Photography And E-Commerce</h4>
				<a href="{{ url('/about-us') }}" class="submt btn14">View More</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/r2.png') }}">
				<h4 style="padding: 33px;">Get The Right Gear</h4>
				<a href="{{ url('/about-us') }}" class="submt btn14">View More</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/r3.png') }}">
				<h4 style="padding: 33px;">Real Estate</h4>
				<a href="{{ url('/about-us') }}" class="submt btn14">View More</a>
			</div>
		</div>		
	</div>
</section>

@endsection