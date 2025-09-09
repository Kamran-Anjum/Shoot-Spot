@extends('layout.frontendLayout.design')
@section('content')


	<!-- =======================================================================================
													  CONTACT US

 =========================================================================================== -->
<section  class="contact">
	<div  class="container">
		<div  class="row">
			<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div  class="con_left">
					<div  class="media position-relative testi_mo">
						<img  src="{{ asset('images/frontend-images/img/c1.png') }}" alt="..." class="mr-3">
						<div  class="media-body">
							<p >Location : <span > Level 1, DIFC Gate Avenue Dubai International Financial Centre Dubai, United Arab Emirates.</span>
							</p>
						</div>
					</div>
					<div  class="media position-relative testi_mo">
						<img  src="{{ asset('images/frontend-images/img/c2.png') }}" alt="..." class="mr-3">
						<div  class="media-body">
							<p >Contact Number : <span > +9714 368 2224</span>
							</p>
						</div>
					</div>
					<div  class="media position-relative testi_mo">
						<img  src="{{ asset('images/frontend-images/img/wa.png') }}" width="33" alt="..." class="mr-3">
						<div  class="media-body">
							<p >WhatsApp : <span > +971 55 117 5177</span>
							</p>
						</div>
					</div>
					<div  class="media position-relative testi_mo">
						<img  src="{{ asset('images/frontend-images/img/c3.png') }}" alt="..." class="mr-3">
						<div  class="media-body">
							<p >Email Address : <span > mp@shaikh-tech.com </span>
							</p>
						</div>
					</div>
					<div  class="media position-relative ">
						<img  src="{{ asset('images/frontend-images/img/www.png') }}" width="30" alt="..." class="mr-3">
						<div  class="media-body">
							<p >Website : <span > www.shaikh-tech.com </span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div  class="contact_us">
					<p  class="mb-3 supoort"> 24/7 Support </p>
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
    								</div><!---->
    							</div>
    							<div  class="col">
    								<div  class="form-group">
    									<input  type="text" formcontrolname="lname" name="lname" placeholder="Last name" required="" class="form-control ng-untouched ng-pristine ng-invalid">
    								</div><!---->
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
							<!-- <a  type="submit" class="read_more submit"> submit </a> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>




@endsection