@extends('layout.userLayout.design')
@section('content')


<div class="container" style="margin-top: 30px;">
	<style type="text/css">
        body{
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;    
        }
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>

    <div class="row">
    	<div class="col-md-12">
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
    	</div>
    </div>
    
    <div class="row gutters-sm">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Edit Profile</h4>
                <hr>
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/customer/edit-profile' ) }}" >{{ csrf_field() }}
                	<div class="form-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ $customer->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $customer->last_name }}">
                                </div>
                            </div>
                        </div>
                      	<div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                            	<div class="row">
                            		<div class="col-md-5 col-sm-5">
                            			<div class="form-group">
		                                    <label class="control-label">Phone Code</label>
		                                    <input type="text" name="phone_code" class="form-control" value="{{ $customer->phone_code }}">
		                                </div>
                            		</div>
                            		<div class="col-md-7 col-sm-7">
                            			<div class="form-group">
		                                    <label class="control-label">Phone Number</label>
		                                    <input type="number" name="phone_number" class="form-control" value="{{ $customer->phone_number }}">
		                                </div>
                            		</div>
                            	</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Date Of Bith</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="{{ $customer->date_of_birth }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <br/>
                                    @if($customer->gender == "Male")
                                        <div class="custom-control custom-radio custom-control-inline" style="margin-left: 25px;">
                                            <input type="radio" value="Male" id="customRadioInline1" checked="checked" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline" style="margin-left: 25px;">
                                            <input type="radio" value="Female" id="customRadioInline2" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Female</label>
                                        </div>
                                    @else
                                        <div class="custom-control custom-radio custom-control-inline" style="margin-left: 25px;">
                                            <input type="radio" value="Male" id="customRadioInline1" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline" style="margin-left: 25px;">
                                            <input type="radio" value="Female" id="customRadioInline2" checked="" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Female</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Image</label>
                                    <input type="file" name="image"  class="form-control" value="{{$customer->image}}">
                                </div>
                                <div>
                                    <img src=" {{ asset('/images/frontend-images/customer/'.$customer->image ) }} " alt="customer"  width="75">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="current_image" value="{{ $customer->image }}">
                        <hr>
                    </div>
                    <div class="form-actions mt-5">
                        <button type="submit" class="btn_user_profile"> <i class="fa fa-check"></i> Edit</button>
                        <a href="{{url('/customer/settings')}}"><button type="button" class="btn_user_profile">Cancel</button></a>
                    </div>

                </form>
              </div>
            </div>
          
        </div>
        <div class="col-md-2"></div>
      </div>
	
</div>


@endsection