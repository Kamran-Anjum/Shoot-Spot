<!-- ==========================================================================================================
													   HERO
		 ========================================================================================================== -->

	<div id="fh5co-hero-wrapper">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="/"><img src="{{ asset('images/frontend-images/img/logo.png') }}" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon" style="background-color: gray;"></span>
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

		<div class="container fh5co-hero-inner">
			<h1 class="animated fadeIn wow" data-wow-delay="0.4s">ALWAYS MISSING<br/>OUT ON THE<br/>MOMENT?</h1>
				<br>
				<a class="wow fadeIn animated" data-wow-delay="0.25s" href="#"><img class="app-store-btn" src="{{ asset('images/frontend-images/img/app-store-icon.png') }}" alt="App Store Icon"></a>
				<a class="wow fadeIn animated" data-wow-delay="0.67s" href="#"><img class="google-play-btn" src="{{ asset('images/frontend-images/img/google-play-icon.png') }}" alt="Google Play Icon"></a>
				
				<img class="fh5co-hero-smartphone animated fadeInRight wow" data-wow-delay="1s" src="{{ asset('images/frontend-images/img/mob.png') }}" alt="Smartphone">
		</div>


	</div> <!-- first section wrapper -->