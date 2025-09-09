@extends('layout.frontendLayout.design')
@section('content')


	<!-- =======================================================================================
													  SIGN UP
 =========================================================================================== -->
<section _ngcontent-cvm-c52="" class="Doctor_form">
	<div _ngcontent-cvm-c52="" class="container bannertext">
		<div _ngcontent-cvm-c52="" class="row justify-content-center">
			<div _ngcontent-cvm-c52="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul _ngcontent-cvm-c52="" class="nav nav-tabs d-flex justify-content-ar ound">
					<li _ngcontent-cvm-c52="" classname="active">
						<button _ngcontent-cvm-c52="" data-toggle="tab"  class="tablinks active" onclick="openCity(event, 'user')">Customer</button>
					</li>
					<li _ngcontent-cvm-c52="">
						<button _ngcontent-cvm-c52="" data-toggle="tab"  class="tablinks active" onclick="openCity(event, 'photographer')">Photographer</button>
					</li>
				</ul>

				<!-- user/customer -->
				<div  class="tab-content">

					@if(Session::has('flash_message_success'))
					    <div class="alert alert-info alert-block">
					        <button type="button" class="close" data-dismiss="alert">×</button>
					        <strong>{!! session('flash_message_success') !!}</strong>
					    </div>
					@endif
					@if(Session::has('flash_message_error'))
					    <div class="alert alert-danger alert-block">
					        <button type="button" class="close" data-dismiss="alert">×</button>
					        <strong>{!! session('flash_message_error') !!}</strong>
					    </div>
					@endif
					<div  id="user" class="tabcontent tab-pane fade active show">
						<form _ngcontent-lcu-c84="" enctype="multipart/form-data" class="ng-untouched ng-pristine ng-invalid" method="post" action="{{ url('/customer-login' ) }}" >{{ csrf_field() }}
							<div  class="col-md-2  col-sm-12 col-xs-12"></div>
								<div  class="row">
								<div  class="col-md-2  col-sm-12 col-xs-12"></div>
								<div  class="col-md-8  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > Email </label>
										<input  type="email" placeholder="Enter Email" required="" name="email" class="form-control">
									</div>
									<div  class="form-group">
										<label >Password </label>
										<input  type="password" placeholder="*********" required="" name="password" class="form-control">
									</div>
								</div>
								<div  class="col-md-2  col-sm-12 col-xs-12"></div>
							</div>
							<div  class="col-md-6 mx-auto col-sm-12 col-xs-12">
								<input  type="submit" value="Customer Sign In" class="submt btn14">
							</div>
							<div class="col-md-6 mx-auto col-sm-12 col-xs-12">
								<a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-danger btn-block">Login With Google</a>
							</div>
						</form>

						
					</div>

					<!-- photographer -->
					<div  id="photographer" class="tabcontent">
						<form _ngcontent-lcu-c84="" enctype="multipart/form-data" class="ng-untouched ng-pristine ng-invalid" method="post" action="{{ url('/photographer-login' ) }}" >{{ csrf_field() }}
							<div  class="row">
								<div  class="col-md-2  col-sm-12 col-xs-12"></div>
								<div  class="col-md-8  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > Email </label>
										<input  type="email" placeholder="Enter Email" required="" name="email" class="form-control">
									</div>
									<div  class="form-group">
										<label >Password </label>
										<input  type="password" placeholder="*********" required="" name="password" class="form-control">
									</div>
								</div>
								<div  class="col-md-2  col-sm-12 col-xs-12"></div>
							</div>
							<div  class="col-md-6 mx-auto col-sm-12 col-xs-12">
								<input  type="submit" value="Photographer Sign In" class="submt btn14">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

	$(document).ready()

	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}

</script>

@endsection