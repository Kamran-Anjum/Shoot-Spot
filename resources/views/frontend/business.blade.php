<!DOCTYPE html>
<!--
    App by FreeHTML5.co
    Twitter: http://twitter.com/fh5co
    URL: http://freehtml5.co
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/backend-images/logo.png') }}">
    <title>BookVR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/bootstrap4.min.css') }}">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/owl.theme.default.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/animate.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/style.css')}}">
</head>
<body>


<div id="page-wrap">

	<?php $user = Auth::user(); ?>

	<div id="element.style" style="background: url('{{asset('images/frontend-images/img/blue_bg.png')}}');">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="/"><img src="{{asset('images/frontend-images/img/logo2.png')}}" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-items-center ml-auto mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{url('/business')}}">Businesses</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/photographer')}}">Photographer</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/about-us')}}">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/contact-us')}}">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/sign-up')}}">Sign Up</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/sign-in')}}">Sign In</a>
					</li>
				</ul>
			</div>
		</nav>

		<div  class="row header_row">
			<div  class="col-md-12 text-center">
				<div  class="banner_content1">
					<div  class="row">
						<div  class="col-md-5 bnr_img">
							<img  src="{{asset('images/frontend-images/img/img2.png')}}">
						</div>
						<div  class="col-md-7 bnr_cnt">
							<h1 >
								<strong  style="color: #034efc">Showcase your business to the world.</strong>
								 High quality photo &amp; video shoots for business &amp; individuals on-demand
							</h1>
							<p >Scheduling a shoot has never been easier. Let the magic begin.</p>
							<div  class="bner_btn">
								@if(!empty($user))
									<a  class="ordr" href="/customer/index">Order</a>
						        @else
									<a  class="ordr" href="/sign-in">Order</a>
						        @endif
							 	<a  class="Contact_us" href="/contact-us">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			

	<!-- ==========================================================================================================
													  ABOUT US

		 ========================================================================================================== -->

	<section _ngcontent-xky-c140="" class="work Give">
		<div _ngcontent-xky-c140="" class="container">
			<h2 _ngcontent-xky-c140="" class="title text-center">Build your brand image and instill life to<span > your images .</span>
			</h2>
			<p _ngcontent-xky-c140="">Trusted by top brands, market leaders &amp; influencers to give them the image they deserve</p>
			<!-- <div _ngcontent-xky-c140="" class="row">
				<div _ngcontent-xky-c140="" class="col-md-4">
					<div _ngcontent-xky-c140="" class="cate text-center">
						<div _ngcontent-xky-c140="" class="img55">
							<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/food.png') }}">
						</div>
						<h2 _ngcontent-xky-c140=""> Food </h2>
						<a _ngcontent-xky-c140="" style="color: #007bff;" href="">Photo</a>
					</div>
				</div>
				<div _ngcontent-xky-c140="" class="col-md-4">
					<div _ngcontent-xky-c140="" class="cate text-center">
						<div _ngcontent-xky-c140="" class="img55">
							<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/img3.png') }}">
						</div>
						<h2 _ngcontent-xky-c140=""> Real Estate </h2>
						<a _ngcontent-xky-c140="" class="photo1" style="color: #007bff;" href="/real-estate">Photo</a><a  class="Video2" href="">Video</a>
						<a _ngcontent-xky-c140="" class="VR360" style="color: #007bff;" href="">360VR</a>
					</div>
				</div>
				<div _ngcontent-xky-c140="" class="col-md-4">
					<div _ngcontent-xky-c140="" class="cate text-center">
						<div _ngcontent-xky-c140="" class="img55">
							<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/img4.png') }}">
						</div>
						<h2 _ngcontent-xky-c140=""> Portrait </h2>
						<a _ngcontent-xky-c140="" class="photo1" style="color: #007bff;" href="">Photo</a><a  class="Video2" href="">Video</a>
					</div>
				</div>
				<div _ngcontent-xky-c140="" class="col-md-4">
					<div _ngcontent-xky-c140="" class="cate text-center">
						<div _ngcontent-xky-c140="" class="img55">
							<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/img5.png') }}">
						</div>
						<h2 _ngcontent-xky-c140=""> Lifestyle </h2>
						<a _ngcontent-xky-c140="" class="photo1" style="color: #007bff;" href="">Photo</a><a  class="Video2" href="">Video</a>
					</div>
				</div>
				<div _ngcontent-xky-c140="" class="col-md-4">
					<div _ngcontent-xky-c140="" class="cate text-center">
						<div _ngcontent-xky-c140="" class="img55">
							<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/img6.png') }}">
						</div>
						<h2 _ngcontent-xky-c140=""> Product </h2>
						<a _ngcontent-xky-c140="" class="photo1" style="color: #007bff;" href="">Photo</a>
						<a _ngcontent-xky-c140="" class="Video2" href="">Video</a>
					</div>
				</div>
				<div _ngcontent-xky-c140="" class="col-md-4">
					<div _ngcontent-xky-c140="" class="cate text-center">
						<div _ngcontent-xky-c140="" class="img55">
							<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/img7.png') }}">
						</div>
						<h2 _ngcontent-xky-c140=""> Event </h2>
						<a _ngcontent-xky-c140="" class="photo1" style="color: #007bff;" href="">Photo</a>
						<a _ngcontent-xky-c140="" class="Video2" href="">Video</a>
					</div>
				</div>
			</div> -->
					
		</div>
		<!-- <div _ngcontent-xky-c140="" class="col-md-12 View">
			<button _ngcontent-xky-c140="" href="#" type="button">View More</button>
		</div> -->
</section>
<!-- <hr> -->


	<!-- ==========================================================================================================
													  PHOTOGRAPHERS 
		 ========================================================================================================== -->

		 <!-- <section  class="after_before">
		 	<div  class="container">
		 		<h2  _ngcontent-ytu-c208="" class="title text-center"> Editing <span  _ngcontent-ytu-c208="">using</span>
		 		</h2>
		 		<p  class="text-center"> A.I, machine learning and hand picked professionals.
		 		</p>
		 		<div  class="row">
		 			<div  class="col-md-12 after_before1">
		 				<div  id="myTabContent" class="tab-content">
		 					<div  class="sliderDisplay">
		 						<div  class="beforeafterthemedark cndkbeforeafter-theme-dark cndkbeforeafter cndkbeforeafter-root cndkbeforeafter-hover" style="width: 1110px; height: 567.333px;">
		 							<div  data-type="data-type-image" class="cndkbeforeafter-item" style="height: 567.333px;">
		 								<div  data-type="before" class="cndkbeforeafter-item-before-c cndkbeforeafter-drag-transition" style="overflow: hidden; z-index: 2; width: 51.8919%;">
		 									<img  src="{{ asset('images/frontend-images/img/bf.png') }}" class="cndkbeforeafter-item-before" style="width: 1110px;">
		 								</div>
		 								<div  data-type="after" class="cndkbeforeafter-item-after-c cndkbeforeafter-drag-transition" style="z-index: 1; width: 48.1081%;">
		 									<img  src="{{ asset('images/frontend-images/img/after.png') }}" class="cndkbeforeafter-item-after" style="width: 1110px;">
		 								</div>
		 							</div>
		 							<div class="cndkbeforeafter-seperator cndkbeforeafter-drag-transition" style="width: 4px; opacity: 0.8; left: 51.8919%;">
		 								<div>
		 									<span>
		 										
		 									</span>
		 								</div>
		 							</div>
		 							<div class="cndkbeforeafter-container">
		 								
		 							</div>
		 							<div class="cndkbeforeafter-item-before-text cndkbeforeafter-bottom-left">BEFORE
		 							</div>
		 							<div class="cndkbeforeafter-item-after-text cndkbeforeafter-bottom-right">AFTER
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 				<ul  id="myTab" role="tablist" class="nav nav-tabs"><li  class="nav-item">
		 					<a  id="Real" data-toggle="tab" href="#Real" role="tab" aria-controls="Real" aria-selected="false" class="nav-link active">Real Estate
		 					</a>
		 				</li>
		 				<li  class="nav-item">
		 					<a  id="Food" data-toggle="tab" href="#Food" role="tab" aria-controls="Food" aria-selected="false" class="nav-link">Food
		 					</a>
		 				</li>
		 				<li  class="nav-item">
		 					<a  id="Experiences" data-toggle="tab" href="#Experiences" role="tab" aria-controls="Experiences" aria-selected="false" class="nav-link">Experiences
		 					</a>
		 				</li>
		 			</ul>
		 		</div>
		 	</div>
		 </div>
		</section> -->


		 

	<!-- ==========================================================================================================
													  Order Shoots
		 ========================================================================================================== -->

		 <section  class="Order22">
		 	<div  class="container">
		 		<div  class="row">
		 			<div  class="col-md-12">
		 				<h2  class="title text-center">
		 					<span >Order shoots on-demand in 3 easy steps with fast image delivery.
		 					</span>
		 					<br > Shoot now. 
		 				</h2>
		 				<p >
		 					@if(!empty($user))
								<a  class="/sign-in" href="/customer/index">Order</a>
					        @else
								<a  class="/sign-in" href="/sign-in">Order</a>
					        @endif
		 				</p>
		 			</div>
		 			<div  class="col-md-7">
		 				<img  src="{{ asset('images/frontend-images/img/lap.png') }}"></div>
		 				<div  class="col-md-5 Order23">
		 					<h3 >Hassle-Free Ordering</h3>
		 					<p > Have your edited &amp; enhanced shoot delivered within 24 hours of the shoot at the earliest, via the Kapturise platform.
		 					</p>
		 				</div>
		 			</div>
		 		</div>
		 	</section>
	
	 

	<!-- ==========================================================================================================
                                                 Brand
    ========================================================================================================== -->

    <section _ngcontent-xky-c140="" class="Superior">
    	<div _ngcontent-xky-c140="" class="container">
    		<div _ngcontent-xky-c140="" class="row">
    			<div _ngcontent-xky-c140="" class="col-md-5 Order23">
    				<h3 _ngcontent-xky-c140="">Brand Quality Assurance</h3>
    				<p _ngcontent-xky-c140="">Using a combination of AI, machine learning and handpicked specialists to edit and ensure quality assurance.
    				</p>
    			</div>
    			<div _ngcontent-xky-c140="" class="col-md-7">
    				<div _ngcontent-xky-c140="" class="row">
    					<div _ngcontent-xky-c140="" class="column">
    						<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/imgs1.png') }}" style="width: 100%;">
    						<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/imgs2.png') }}" style="width: 100%;">
    					</div>
    					<div _ngcontent-xky-c140="" class="column">
    						<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/imgs3.png') }}" style="width: 100%;">
    						<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/imgs4.png') }}" style="width: 100%;">
    					</div>
    					<div _ngcontent-xky-c140="" class="column">
    						<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/imgs5.png') }}" style="width: 100%;">
    						<img _ngcontent-xky-c140="" src="{{ asset('images/frontend-images/img/imgs6.png') }}" style="width: 100%;">
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    	

    	<!-- ==========================================================================================================
                                              PHOTO
    ========================================================================================================== -->

    <section  class="find_out find">
    	<div  class="container">
    		<div  class="row">
    			<div  class="col-md-10 mx-auto">
    				<div  class="text-center bulk">
    					<h2 > Bulk photo edits using a combination of AI,machine learning and handpicked specialists to edit and ensure quality assurance
    					</h2>
    					<a  class="lets_btn" href="/about-us">Find out more </a>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


<!-- ==========================================================================================================
                                               SHADULE
    ========================================================================================================== -->

    <section  class="Launch">
    	<div  class="container">
    		<div  class="row">
    			<div  class="col-md-12">
    				<div  class="user_say">
    					<h2  class="title text-center"> Let the magic begin. <span >Schedule your first shoot now</span></h2>
    					<div  class="bner_btn botm">
    						@if(!empty($user))
								<a  class="ordr" href="/customer/index">Order</a>
					        @else
								<a  class="ordr" href="/sign-in">Order</a>
					        @endif
    						<a  class="Contact_us" href="/contact-us">Contact Us</a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!-- ==========================================================================================================
                                               SECTION 7 -  FOOTER
    ========================================================================================================== -->


    <footer >
    	<div  class="container">
    		<div  class="row">
    			<div  class="col-md-6 ml-5 ml-sm-0">
    				<div  class="foot-about">
    					<h4  class="foot-before"> About us </h4>
    					<p >
                         Book <span  style="color: #00B0F0 !important;">VR</span> is an on-demand photography app for all your individual and business needs.
                        </p>
                        <p > We understand the importance of a moment and the beauty it holds within; while some moments present themselves, others catch you off guard, and our hand-picked and vetted photographers are just a click away to ensure you don’t miss any of them and capture them all.
                        </p>
    					<h4  class="foot-before my-3"> We Accept </h4>
    					<a >
    						<img  src="{{ asset('images/frontend-images/img/card1.png') }}" class="mr-3">
    					</a>
    					<a >
    						<img  src="{{ asset('images/frontend-images/img/card2.png') }}">
    					</a>
    					<br >
    					<br >
    				</div>
    			</div>
    			<div  class="col-md-6 ml-5 ml-sm-0">
    				<div  class="links">
    					<h4 >Quick Links </h4>
    					<ul >
    						<li >
    							<a  href="{{url('/about-us')}}"> About us </a>
    						</li>
    						<li >
    							<a  href="{{url('/term-and-condition')}}"> Terms &amp; Conditions </a>
    						</li>
    						<li >
    							<a  href="{{url('/term-and-condition-photographer')}}"> Terms &amp; Conditions Photographer </a>
    						</li>
    						<li >
    							<a  href="{{url('/privacy-policy')}}"> Privacy Policy </a>
    						</li>
    						<li >
                                <a  href="{{url('/faq')}}"> Faq </a>
    						</li>
                            <li >
                                <a  href="{{url('/gallery')}}"> Gallery </a>
                            </li>
                            <li >
                                <a  href="{{url('/resources')}}"> Resources </a>
                            </li>
    					</ul>
    				</div>
                    <div  class="social">
                        <h4 >Social Media </h4>
                        <ul  class="mb-3">
                            <li >
                                <a  href=" https://www.facebook.com/Bookvrapp-107726208062585">
                                    <img  src="{{ asset('images/frontend-images/img/fb.png') }}">
                                </a>
                            </li>
                            <li >
                                <a  href="https://www.instagram.com/bookvrapp/">
                                    <img  src="{{ asset('images/frontend-images/img/insta.png') }}">
                                </a>
                            </li>
                            <li >
                                <a  href=" https://twitter.com/Bookvrapp"><img  src="{{ asset('images/frontend-images/img/twitter.png') }}"></a>
                            </li>
                        </ul>
                    </div>
    			</div>
			</div>
				<div _ngcontent-auu-c51="" class="row">
					<div _ngcontent-auu-c51="" class="col-md-12">
						<h5 _ngcontent-auu-c51="" class="cap"> Copyright &copy; <?php echo date('Y')?> - All Rights Reserved By BookVR. Design And Developed By <a href="https://cogentdevs.com/">CogentDevs</a>. </h5>
					</div>
				</div>
			</div>
		</footer>

</div> <!-- main page wrapper -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    
    <script src="{{ asset('js/frontend-js/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/frontend-js/js/bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/frontend-js/js/main.js') }}"></script>
</body>
</html>
