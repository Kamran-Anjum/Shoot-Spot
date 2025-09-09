@extends('layout.frontendLayout.design')
@section('content')

	<!-- ==========================================================================================================
													 ADVANTAGES
		 ========================================================================================================== -->

	<div class="fh5co-advantages-outer">
		<div class="container">
			<h1 class="second-title"><span class="span-perfect">HOW DOES IT</span> <span class="span-features">WORK?</span></h1>
			<!-- <small>Only necessary</small> -->
            <div  class="row fh5co-advantages-grid-columns wow animated fadeIn" data-wow-delay="0.36s">
                <div  class="col-md-3">
                    <div  class="shoot text-center">
                        <img  src="{{ asset('images/frontend-images/img/h1.png') }}" class="fad fadeIn" aria-hidden="true">
                        <h5 >Get Notified</h5>
                        <p >Choose the location,date,time and what you would like to shoot</p>
                    </div>
                </div>
                <div  class="col-md-3">
                    <div  class="shoot text-center">
                        <img  src="{{ asset('images/frontend-images/img/h2.png') }}" class="fad fadeIn" aria-hidden="true">
                        <h5 >Photographer Found</h5>
                        <p >Get matched with the perfect photographer.</p>
                    </div>
                </div>
                <div  class="col-md-3">
                    <div  class="shoot text-center">
                        <img  src="{{ asset('images/frontend-images/img/h3.png') }}" class="fad fadeIn" aria-hidden="true">
                        <h5 >Enjoy Shoot</h5>
                        <p >Enjoy your video & photo shoot in the hands of an experienced professional</p>
                    </div>
                </div>
                <div  class="col-md-3">
                    <div  class="shoot text-center">
                        <img  src="{{ asset('images/frontend-images/img/h4.png') }}" class="fad fadeIn" aria-hidden="true">
                        <h5 >Upload Shoot</h5>
                        <p >Download Edited Shoot</p>
                    </div>
                </div>
            </div>

		</div>
	</div>




	<!-- ==========================================================================================================
													  ABOUT US

		 ========================================================================================================== -->

	<section id="about_us">
		<div class="container">
			<div class="row">
				<div class="col-md-6 about_left">
					<img src= "{{ asset('images/frontend-images/img/about.png') }}" alt="Icon-3">
				</div>
				<div class="col-md-6">
					<h1 class="second-title"><span class="span-perfect">ABOUT</span> <span class="span-features">US</span></h1>
					<p _ngcontent-hik-c138="">
                     Book <span _ngcontent-hik-c138="" style="color: #00B0F0 !important;">VR</span> is an on-demand photography app for all your individual and business needs.
                    </p>
                    <p _ngcontent-hik-c138=""> We understand the importance of a moment and the beauty it holds within; while some moments present themselves, others catch you off guard, and our hand-picked and vetted photographers are just a click away to ensure you don’t miss any of them and capture them all.
                    </p>
					<br>
					<a  class="read_more btn14" href="/about-us"> Read More.. </a>
				</div>
			</div>
		</div>
	</section>

	<!-- ==========================================================================================================
                                                 TESTIMONIALS
    ========================================================================================================== -->

    	<section  class="about_us testimonials12" style="border-top: 1px solid #eee;">
    		<div  class="container">
    			<h2  class="title text-center"> Testimonials </h2>
    			<div  class="row">
    				<div  class="col-md-4 mb-3">
    					<div  class="user_say">
    						<p >Amorette is truly an outstanding person with an almost mystical ability to capture the true nature of people and events </p>
    						<img  src="{{ asset('images/frontend-images/img/user1.png') }}">
    						<h6 > Amorette </h6>
    						<span > Business </span>
    					<div  class="clear">
    						
    					</div>
    				</div>
    			</div>
    			<div  class="col-md-4 mb-3">
    				<div  class="user_say">
    					<p >Thomas a great photographer. He was so good with our kids and we’re so delighted with our photographs. We’ll treasure them forever.</p>
    					<img  src="{{ asset('images/frontend-images/img/user2.png') }}">
    					<h6 > Thomas </h6>
    					<span > Photographer </span>
    				<div  class="clear">
    					
    				</div>
    			</div>
    		</div>
    		<div  class="col-md-4 mb-3">
    					<div  class="user_say">
    						<p > Ann a great photographer. She was so good with our kids and we’re so delighted with our photographs. We’ll treasure them forever.</p>
    						<img  src="{{ asset('images/frontend-images/img/user3.png') }}">
    						<h6 > Ann </h6>
    						<span > Photographer </span>
    						<div  class="clear">
    							
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>



    	<!-- ==========================================================================================================
                                                 KAPTURISE 
    ========================================================================================================== -->

    <section  class="kapt_for">
    	<div  class="container">
    		<h2  class="title text-center"> BookVR <span > For </span></h2>
    		<div  class="row">
    			<div  class="col-md-4 mb-3">
    				<div  class="moments">
    					<img  src="{{ asset('images/frontend-images/img/kapt1.png') }}" class="fad" aria-hidden="true">
    					<h5 > All Your Moments </h5>
    					<a  class="read_more_2" href="/about-us"> Read More </a>
    				</div>
    			</div>
    			<div  class="col-md-4 mb-3">
    				<div  class="moments">
    					<img  src="{{ asset('images/frontend-images/img/kapt2.png') }}" class="fad" aria-hidden="true">
    					<h5 > Business </h5>
    					<a  class="read_more_2" href="/business"> Read More </a>
    				</div>
    			</div>
    			<div  class="col-md-4 mb-3">
    				<div  class="moments">
    					<img  src="{{ asset('images/frontend-images/img/kapt3.png') }}" class="fad" aria-hidden="true">
    					<h5 > Photographers </h5>
    					<a  class="read_more_2" href="/photographer"> Read More </a>
    				</div>
    			</div>
    		</div>
    		<hr>
    	</div>
    </section>


<!-- ==========================================================================================================
                                               CONTACT US
    ========================================================================================================== -->

    <section  class="contact">
    	<div  class="container">
    		<div  class="row">
    			<div _ngcontent-lcu-c84="" class="col-md-6 col-sm-12 col-xs-12 about_left">
    				<img _ngcontent-lcu-c84="" src="{{ asset('images/frontend-images/img/contact.png') }}" class="fad" aria-hidden="true">
                    <!-- <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div> -->
    			</div>
    			<div  class="col-md-6">
    				<div  class="contact_us">
    					<h2  class="title"> Contact <span > Us </span></h2>
    					<p  class="mb-3"><span style="color: #00B0F0 !important;" >24/7 Support</span> </p>
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-info alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif
    					<form  class="ng-untouched ng-pristine ng-invalid" method="post" action="{{ url('/contact-msg-send' ) }}" >{{ csrf_field() }}
    						<div  class="row">
    							<div  class="col">
    								<div  class="form-group">
    									<input  type="text" formcontrolname="fname" name="fname" placeholder="First name" required="" class="form-control ng-untouched ng-pristine ng-invalid">
    								</div>
    							</div>
    							<div  class="col">
    								<div  class="form-group">
    									<input  type="text" formcontrolname="lname" name="lname" placeholder="Last name" required="" class="form-control ng-untouched ng-pristine ng-invalid">
    								</div>
    							</div>
    						</div>
    						<div  class="row">
    							<div  class="col">
    								<div  class="form-group">
    									<input  type="number" placeholder="Phone number" name="number" formcontrolname="contactno" required="" class="form-control ng-untouched ng-pristine ng-invalid"></div><!---->
    								</div>
    								<div  class="col">
    									<div  class="form-group">
    										<input  type="email" formcontrolname="emailu" name="email" placeholder="E-mail" required="" class="form-control ng-untouched ng-pristine ng-invalid">
    									</div><!---->
    								</div>
    							</div>
    							<div  class="form-group">
    								<textarea  id="exampleFormControlTextarea1" rows="5" name="msg" formcontrolname="msg" required="" placeholder="Write Message Here" class="form-control ng-untouched ng-pristine ng-invalid"></textarea>
    							</div><!---->
                                <button   type="submit" class="read_more btn14" style="border: none;">Submit</button>
    							<!-- <input  type="submit" value="Submit" class="read_more submit btn14"> -->
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>

@endsection

<!-- @section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="{{ asset('js/indexmap.js') }}"></script>
@endsection -->