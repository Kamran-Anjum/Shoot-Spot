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
						<form _ngcontent-lcu-c84="" enctype="multipart/form-data" class="ng-untouched ng-pristine ng-invalid" method="post" action="{{ url('/customer-register' ) }}" >{{ csrf_field() }}
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > First Name </label>
										<input  type="text" placeholder="First Name" required="" name="first_name" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > Last Name </label>
										<input  type="text" placeholder="Last Name" required="" name="last_name" class="form-control">
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > Email </label>
										<input  type="email" placeholder="Enter Email" required="" name="email" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div class="row">
										<div class="col-md-4  col-sm-4 col-xs-4">
											<div  class="form-group">
												<label > Phone Code </label>
												<input  type="text" placeholder="+92" required="" name="phone_code" class="form-control">
											</div>
										</div>
										<div class="col-md-8  col-sm-8 col-xs-8">
											<div  class="form-group">
												<label > Phone  Number </label>
												<input  type="number" placeholder="3460329659" required="" name="phone_number" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Date of Birth</label>
										<input  type="date" required="" name="date_of_birth" class="form-control" max="2003-03-10">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12 gendr">
									<div  class="form-group">
										<label >Gender </label>
										<br >
										<label >
											<input  type="radio" name="gender" value="Male" checked="" required="" class="signup_radio ng-untouched ng-pristine ng-invalid"> Male 
										</label>
										<label >
											<input  type="radio" name="gender" value="Female" class="ml-2 signup_radio ng-untouched ng-pristine ng-invalid"> Female
									    </label><!---->
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Password </label>
										<input  type="password" placeholder="*********" required="" name="password" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Confirm Password </label>
										<input  type="Password" placeholder="*********" required="" name="confirm_password" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div  class="col-md-4 col-sm-12 col-xs-12">
									<div  class="form-group imgUp">
									   <label >Upload Profile Pic</label>
										<div class="imagePreview"></div>
										<label class="btn text-white btn-upload-image">Upload<input type="file" class="uploadFile img" value="" name="image" required=""></label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div  class="custom-control custom-checkbox">
											<input  type="checkbox" id="customCheck1" name="check" required="" class="custom-control-input ng-untouched ng-pristine ng-invalid"><label  for="customCheck1" class="custom-control-label pt-1">I accept <a  style="color: #007bff;" href="{{url('/term-and-condition')}}"> terms &amp; conditions</a>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div  class="mx-auto">
									<input  type="submit" value="Sign Up" class="submt btn14">
								</div>
							</div>
							
						</form>
					</div>

					<!-- photographer -->
					<div  id="photographer" class="tabcontent">
						<form _ngcontent-lcu-c84="" enctype="multipart/form-data" class="ng-untouched ng-pristine ng-invalid" method="post" action="{{ url('/photographer-register' ) }}" >{{ csrf_field() }}
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > First Name </label>
										<input  type="text" placeholder="First Name" required="" name="first_name" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > Last Name </label>
										<input  type="text" placeholder="Last Name" required="" name="last_name" class="form-control">
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label > Email </label>
										<input  type="email" placeholder="Enter Email" required="" name="email" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div class="row">
										<div class="col-md-4  col-sm-4 col-xs-4">
											<div  class="form-group">
												<label > Phone Code </label>
												<input  type="text" placeholder="+92" required="" name="phone_code" class="form-control">
											</div>
										</div>
										<div class="col-md-8  col-sm-8 col-xs-8">
											<div  class="form-group">
												<label > Phone  Number </label>
												<input  type="number" placeholder="3460329659" required="" name="phone_number" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Date of Birth</label>
										<input  type="date" required="" name="date_of_birth" class="form-control" max="2003-03-10">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12 gendr">
									<div  class="form-group">
										<label >Gender </label>
										<br >
										<label >
											<input  type="radio" name="gender" value="Male" checked="" required="" class="signup_radio ng-untouched ng-pristine ng-invalid"> Male 
										</label>
										<label >
											<input  type="radio" name="gender" value="Female" class="ml-2 signup_radio ng-untouched ng-pristine ng-invalid"> Female
									    </label><!---->
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Location </label>
										<input  type="text" placeholder="Your Address" required="" name="address" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Experience </label>
										<input  type="text" placeholder="2+ Years" required="" name="experience" class="form-control">
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >3D Photography Equipment</label>
										 <select id="equipment_id" name="equipment_id" required="" class="form-control">
                                            @foreach($equipments as $equipment)
                                                <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >3D Spaces Photographed </label>
										<select id="spaces_photograph_id" name="spaces_photograph_id" required="" class="form-control">
                                            @foreach($spaces as $space)
                                                <option value="{{ $space->id }}">{{ $space->name }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div id="eqp_other" class="form-group hide">
										<label >3D Photography Equipment Name</label>
										<input readonly="" id="equip_other_name"  type="text" placeholder="Equipment Name" name="equip_other_name" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >About You</label>
										<textarea placeholder="Your Address" required="" name="bio" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div  class="row">
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Password </label>
										<input  type="password" placeholder="*********" required="" name="password" class="form-control">
									</div>
								</div>
								<div  class="col-md-6  col-sm-12 col-xs-12">
									<div  class="form-group">
										<label >Confirm Password </label>
										<input  type="Password" placeholder="*********" required="" name="confirm_password" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div  class="col-md-4 col-sm-12 col-xs-12">
									<div  class="form-group imgUp">
									   <label >Upload Profile Pic</label>
										<div class="imagePreview"></div>
										<label class="btn text-white btn-upload-image">Upload<input type="file" class="uploadFile img" value="" name="image" required=""></label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div  class="custom-control custom-checkbox">
											<input  type="checkbox" id="customCheck2" name="check" required="" class="custom-control-input ng-untouched ng-pristine ng-invalid"><label  for="customCheck2" class="custom-control-label pt-1">I accept <a  style="color: #007bff;" href="{{url('/term-and-condition')}}"> terms &amp; conditions</a>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div  class="mx-auto">
									<input  type="submit" value="Sign Up" class="submt btn14">
								</div>
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