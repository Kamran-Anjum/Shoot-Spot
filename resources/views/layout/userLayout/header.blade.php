<!-- ==========================================================================================================
													   HERO
		 ========================================================================================================== -->

	<div id="fh5co-hero-wrapper-user">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="{{ url('/customer/index')}}"><img src="{{ asset('images/frontend-images/img/logo.png') }}" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon" style="background-color: gray;"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-items-center ml-auto mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{url('/customer/bookings')}}">Bookings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/customer/messages')}}">Messages</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/customer/notification')}}">Notifications</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/customer/settings')}}">Setting</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/customer/logout')}}">Log Out</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container fh5co-hero-inner">
			<h1 class="animated fadeIn wow" data-wow-delay="0.4s">WHAT WOULD YOU LIKE TO<br/>SHOOT?</h1>
		</div>


	</div> <!-- first section wrapper -->