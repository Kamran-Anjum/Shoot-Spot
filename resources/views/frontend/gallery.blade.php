@extends('layout.frontendLayout.design')
@section('content')
	
<section style="padding: 70px;">
	<div class="container">

		<h2  class="title text-left">Gallery</h2>
		<br>
		<br>
		<div class="row text-center">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary1.png') }}">
				<h4 style="padding: 10px;">Real Estate</h4>
				<a href="https://matterport.com/gallery/penthouse-dubai" class="submt btn14">View 360 VR</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary2.png') }}">
				<h4 style="padding: 10px;">Hotels & Restaurants</h4>
				<a href="https://matterport.com/gallery/anaheim-white-house-restaurant" class="submt btn14">View 360 VR</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary3.png') }}">
				<h4 style="padding: 10px;">Travel and Tourism</h4>
				<a href="https://matterport.com/gallery/furusiyya-art-chivalry-between-east-and-west" class="submt btn14">View 360 VR</a>
			</div>
		</div>

		<br>
		<br>

		<div class="row text-center">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary4.png') }}">
				<h4 style="padding: 10px;">Facility Management</h4>
				<a href="https://matterport.com/gallery/middle-school-and-high-school-building" class="submt btn14">View 360 VR</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary5.png') }}">
				<h4 style="padding: 10px;">Retail & Commercials</h4>
				<a href="https://matterport.com/gallery/hashmonaim-community-center" class="submt btn14">View 360 VR</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary6.png') }}">
				<h4 style="padding: 10px;">Insurance & Restoration</h4>
				<a href="https://matterport.com/gallery/fire-damage-scan-superior-restoration" class="submt btn14">View 360 VR</a>
			</div>
		</div>

		<br>
		<br>

		<div class="row text-center">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary7.png') }}">
				<h4 style="padding: 0px;">Engineering, Architecture & Construction</h4>
				<a href="https://matterport.com/gallery/home-under-construction" class="submt btn14">View 360 VR</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary8.png') }}">
				<h4 style="padding: 11px;">Interior Design</h4>
				<a href="https://matterport.com/gallery/funhouse-house" class="submt btn14">View 360 VR</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<img src="{{ asset('images/frontend-images/img/gallary9.png') }}">
				<h4 style="padding: 11px;">Furniture & Virtual Staging</h4>
				<a href="https://matterport.com/gallery/living-room-escape-room" class="submt btn14">View 360 VR</a>
			</div>
		</div>
				
	</div>
</section>

@endsection