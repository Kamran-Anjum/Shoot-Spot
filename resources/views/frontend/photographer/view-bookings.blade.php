@extends('layout.photographerLayout.design')
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
        /* Style the tab */
	.tab {
	  overflow: hidden;
	  border: 1px solid #ccc;
	  background-color: #f1f1f1;
	  border-radius: 10px 10px 0px 0px;
	}

	/* Style the buttons inside the tab */
	.tab button {
	  background-color: inherit;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 16px;
	  transition: 0.3s;
	  font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
	  display: none;
	  padding: 6px 12px;
	  border: 1px solid #ccc;
	  border-top: none;
	  border-radius: 0px 0px 10px 10px;
	}

	.tabcontentonload {
	  display: block;
	  padding: 6px 12px;
	  border: 1px solid #ccc;
	  border-top: none;
	  border-radius: 0px 0px 10px 10px;
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
		<div class="col-md-12 col-sm-12 col-xs-12 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex flex-column ">
						<div class="mt-3">
							<div class="tab">
				  				<button class="tablinks" onclick="openCity(event, 'ongoing')">ONGOING</button>
				  				<button class="tablinks" onclick="openCity(event, 'upcoming')">SCHEDULED</button>
				  				<button class="tablinks" onclick="openCity(event, 'completed')">PAST</button>
							</div>

							<div id="ongoing" class="tabcontent">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-20">
										<div class="section-title style-3">
											<div class="table-responsive">
                            					<table id="zero_config" class="table table-striped border">
													@if($ongoing_booking_count > 0 )
														@foreach($ongoing_bookings as $booking)
		                            						<tr>
		                            							<td>
		                            								<div class="row">
		                            									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		                            										<img src=" {{ asset('/images/frontend-images/customer/'.$booking->image ) }} " alt="customer" width="150">
		                            									</div>
		                            									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		                            										{{ $booking->location }}
		                            									</div>
		                            								</div>
		                            								<br>
		                            								<div class="row">
		                            									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		                            										{{ $booking->first_name }} {{$booking->last_name}}<br>
		                            										{{ $booking->day }}<br>
												                            {{ $booking->year }}-{{ $booking->month }}-{{ $booking->date }}<br>
												                            {{ $booking->time }}
		                            									</div>
		                            									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		                            										{{ $booking->code }}{{$booking->number}}<br>
		                            										{{ $booking->shootfor_name }}/{{$booking->pck_req_name}}<br>
		                            										{{ $booking->total_amount }}<br>
		                            										<a href="{{ url('/photographer/booking-detail/'.$booking->id ) }}" class="btn btn-sm btn-info" style="background-color: dodgerblue;border: none !important;">View Details</a>
		                            									</div>
		                            								</div>
		                            							</td>
		                            						</tr>
			                            				@endforeach
		                            				@else
		                            					<h4>No Booking</h4>
		                            				@endif
                            					</table>
                            				</div>
										</div>
									</div>
								</div>
							</div>

							<div id="upcoming" class="tabcontent tabcontentonload">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-20">
										<div class="section-title style-3">
											<div class="table-responsive">
                            					<table id="zero_config" class="table table-striped border">
													@if($upcoming_booking_count > 0 )
														@foreach($upcoming_bookings as $booking)
		                            						<tr>
		                            							<td>
		                            								<div class="row">
		                            									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		                            										<img src=" {{ asset('/images/frontend-images/customer/'.$booking->image ) }} " alt="customer"  width="150">
		                            									</div>
		                            									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		                            										{{ $booking->location }}
		                            									</div>
		                            								</div>
		                            								<br>
		                            								<div class="row">
		                            									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		                            										{{ $booking->first_name }} {{$booking->last_name}}<br>
		                            										{{ $booking->day }}<br>
												                            {{ $booking->year }}-{{ $booking->month }}-{{ $booking->date }}<br>
												                            {{ $booking->time }}
		                            									</div>
		                            									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		                            										{{ $booking->code }}{{$booking->number}}<br>
		                            										{{ $booking->shootfor_name }}/{{$booking->pck_req_name}}<br>
		                            										{{ $booking->total_amount }}<br>
		                            										<a href="{{ url('/photographer/booking-detail/'.$booking->id ) }}" class="btn btn-sm btn-info" style="background-color: dodgerblue;border: none !important;">View Details</a>
		                            									</div>
		                            								</div>
		                            							</td>
		                            						</tr>
			                            				@endforeach
		                            				@else
		                            					<h4>No Booking</h4>
		                            				@endif
                            					</table>
                            				</div>
										</div>
									</div>
								</div>
							</div>

							<div id="completed" class="tabcontent">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-20">
										<div class="section-title style-3">
											<div class="table-responsive">
                            					<table id="zero_config" class="table table-striped border">
													@if($complete_booking_count > 0 )
														@foreach($complete_bookings as $booking)
		                            						<tr>
		                            							<td>
		                            								<div class="row">
		                            									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		                            										<img src=" {{ asset('/images/frontend-images/customer/'.$booking->image ) }} " alt="customer"  width="150">
		                            									</div>
		                            									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		                            										{{ $booking->location }}
		                            									</div>
		                            								</div>
		                            								<br>
		                            								<div class="row">
		                            									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		                            										{{ $booking->first_name }} {{$booking->last_name}}<br>
		                            										{{ $booking->day }}<br>
												                            {{ $booking->year }}-{{ $booking->month }}-{{ $booking->date }}<br>
												                            {{ $booking->time }}
		                            									</div>
		                            									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		                            										{{ $booking->code }}{{$booking->number}}<br>
		                            										{{ $booking->shootfor_name }}/{{$booking->pck_req_name}}<br>
		                            										{{ $booking->total_amount }}<br>
		                            										<a href="{{ url('/photographer/booking-detail/'.$booking->id ) }}" class="btn btn-sm btn-info" style="background-color: dodgerblue;border: none !important;">View Details</a>
		                            									</div>
		                            								</div>
		                            							</td>
		                            						</tr>
	                            						@endforeach
		                            				@else
		                            					<h4>No Booking</h4>
		                            				@endif
                            					</table>
                            				</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</div>
	
</div>

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