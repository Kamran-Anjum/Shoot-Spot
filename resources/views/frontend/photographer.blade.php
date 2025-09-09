@extends('layout.frontendLayout.design')
@section('content')


<section  class="work">
	<div  class="container">
		<h2  class="title text-center"> How does it <span > work? </span>
		</h2>
		<div  class="row">
			<div  class="col-md-3">
				<div  class="shoot text-center">
					<img  src="{{ asset('images/frontend-images/img/h1.png') }}" class="fad fadeIn" aria-hidden="true">
					<h5 >Get Notified</h5>
					<p >Choose your availability and what you can shoot. Receive scheduled &amp; on-demand gigs.</p>
				</div>
			</div>
			<div  class="col-md-3">
				<div  class="shoot text-center">
					<img  src="{{ asset('images/frontend-images/img/h2.png') }}" class="fad fadeIn" aria-hidden="true">
					<h5 >Photographer Found</h5>
					<p >Check requirements and ready equipment needed.</p>
				</div>
			</div>
			<div  class="col-md-3">
				<div  class="shoot text-center">
					<img  src="{{ asset('images/frontend-images/img/h3.png') }}" class="fad fadeIn" aria-hidden="true">
					<h5 >Enjoy Shoot</h5>
					<p >Help bring the creative vision to life</p>
				</div>
			</div>
			<div  class="col-md-3">
				<div  class="shoot text-center">
					<img  src="{{ asset('images/frontend-images/img/h4.png') }}" class="fad fadeIn" aria-hidden="true">
					<h5 >Upload Shoot</h5>
					<p >Edit shoot &amp; get paid</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ============================================================================================
													  GALLRY
============================================================================================= -->

<section  class="gallry">
	<div  class="container-fluid">
		<div  class="row">
			<div  class="col-md-4">
				<div  class="glry_in">
					<img  src="{{ asset('images/frontend-images/img/g1.png') }}" width="100%">
				</div>
			</div>
			<div  class="col-md-4">
				<div  class="glry_in">
					<img  src="{{ asset('images/frontend-images/img/g2.png') }}" width="100%">
				</div>
			</div>
			<div  class="col-md-4">
				<div  class="glry_in">
					<img  src="{{ asset('images/frontend-images/img/g3.png') }}" width="100%">
				</div>
			</div>
			<div  class="col-md-8">
				<div  class="glry_in short-div_1">
					<img  src="{{ asset('images/frontend-images/img/g4.png') }}" width="100%">
				</div>
			</div>
			<div  class="col-lg-4">
				<div  class="short-div">
					<div  class="glry_in">
						<img  src="{{ asset('images/frontend-images/img/g5.png') }}" width="100%">
					</div>
				</div>
				<div  class="short-div">
					<div  class="glry_in">
						<img  src="{{ asset('images/frontend-images/img/g6.png') }}" width="100%">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- ============================================================================================
													  WHY SECTION
============================================================================================= -->


<section  class="photographers">
	<div  class="container">
		<h2  class="title text-center"> Why <span > BookVR? </span>
		</h2>
		<div  class="owner text-center">
			<p >Focus on what you love to do. Be your own boss, shoot more, earn more! Kapturise will take care of all the operational, marketing, admin, customer support, &amp; commercial negotiations. Just show up to the shoot and upload the edited shoot to get pai
			</p>
		</div>
	</div>
</section>


<!-- ============================================================================================
													  FIND OUT
============================================================================================= -->

<section class="find_out">
	<div  class="container">
		<div  class="row">
			<div  class="col-md-10 mx-auto">
				<div  class="text-center bulk">
					<h2 >BULK PHOTO EDITS USING A COMBINATION OF AI,MACHINE LEARNING AND HANDPICKED SPECIALISTS TO EDIT AND ENSURE QUALITY ASSURANCE</h2>
					<a  class="lets_btn" href="/about-us">Find out more </a>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ============================================================================================
													  TESTIMONIALS12
============================================================================================= -->

	<section  class="about_us testimonials12" style="border-top: 1px solid #eee;">
		<div  class="container">
			<h2  class="title text-center"> Testimonials </h2>
			<div  class="row">
				<div  class="col-md-4 mb-3">
					<div  class="user_say">
						<p >Amorette is truly an outstanding person with an almost mystical ability to capture the true nature of people and events 
						</p>
						<img  src="{{ asset('images/frontend-images/img/user1.png') }}">
						<h6 > Amorette </h6>
						<span > Business </span>
						<div  class="clear"></div>
					</div>
				</div>
				<div  class="col-md-4 mb-3">
					<div  class="user_say">
						<p >Thomas a great photographer. He was so good with our kids and we’re so delighted with our photographs. We’ll treasure them forever.
						</p>
						<img  src="{{ asset('images/frontend-images/img/user2.png') }}"><h6 > Thomas </h6>
						<span > Photographer </span>
						<div  class="clear"></div>
					</div>
				</div>
				<div  class="col-md-4 mb-3">
					<div  class="user_say">
						<p > Ann a great photographer. She was so good with our kids and we’re so delighted with our photographs. We’ll treasure them forever.
						</p>
						<img  src="{{ asset('images/frontend-images/img/user3.png') }}"><h6 > Ann </h6>
						<span > Photographer </span>
						<div  class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection