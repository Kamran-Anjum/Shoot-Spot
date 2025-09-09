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
      <div class="col-md-12 col-sm-12">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Get Quote</h4>
                <hr>
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/customer/create-booking' ) }}" >{{ csrf_field() }}
                	<div class="form-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input readonly="" type="text" name="first_name" class="form-control" value="{{ $customer->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input readonly="" type="text" name="last_name" class="form-control" value="{{ $customer->last_name }}">
                                </div>
                            </div>
                        </div>
                      	<div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input readonly="" type="email" name="email" class="form-control" value="{{ $customer->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                            	<div class="row">
                            		<div class="col-md-5 col-sm-5">
                            			<div class="form-group">
		                                    <label class="control-label">Phone Code</label>
		                                    <input readonly="" type="text" name="phone_code" class="form-control" value="{{ $customer->phone_code }}">
		                                </div>
                            		</div>
                            		<div class="col-md-7 col-sm-7">
                            			<div class="form-group">
		                                    <label class="control-label">Phone Number</label>
		                                    <input readonly="" type="number" name="phone_number" class="form-control" value="{{ $customer->phone_number }}">
		                                </div>
                            		</div>
                            	</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input required="" type="text" id="address-input" name="location" class="form-control map-input">
                                    <input type="hidden" name="latitude" id="address-latitude" value="0" />
                                    <input type="hidden" name="longitude" id="address-longitude" value="0" />
                                </div>
                                <div id="address-map-container" style="width:100%;height:400px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Date</label>
                                    <input required="" type="date" name="full_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Time</label>
                                    <input required="" type="time" name="time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Shoot For</label>
                                    <select id="shoot_for_id" name="shoot_for_id" required="" class="form-control">
                                        @foreach($shoot_fors as $shoot_for)
                                            <option value="{{ $shoot_for->id }}">{{ $shoot_for->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Package Requested</label>
                                    <select id="package_request_id" name="package_request_id" required="" class="form-control">
                                        @foreach($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Additional Details</label>
                                    <textarea name="details" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-actions mt-5">
                        <button class="btn btn-primary border rounded-0" type="submit" style="background-color: dodgerblue;border: none !important;">Get Quote</button>
                    </div>

                </form>
              </div>
            </div>
          
        </div>
      </div>
	
</div>


@endsection

@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="{{ asset('js/mapInput.js') }}"></script>
@endsection

