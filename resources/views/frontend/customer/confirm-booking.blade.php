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
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Confirm Booking</h4>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p>Location : {{ $booking->location }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <p>
                            {{ $booking->day }}<br>
                            {{ $booking->year }}-{{ $booking->month }}-{{ $booking->date }}<br>
                            {{ $booking->time }}
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <p>
                            BookingID : <br> 
                            {{ $booking->booking_code }}{{$booking->booking_no}}
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <p>
                            Shoot For : <br> 
                            {{ $booking->shootfor_name }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p>
                            Paackage Request : {{ $booking->pck_req_name }} / {{ $booking->total_amount }}
                        </p>
                    </div>
                </div>
                <hr>
                <form method="post" action="{{ url('/customer/booking-confirm/'.$booking_id) }}"> {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Add Promo Code</label>
                                    <input type="text" name="promo_code" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Loyalty Points</label>
                                    <input type="text" name="loyalty_points" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"><small style="color: red;">Note: Both Promo Code And Loyalty Point Cannot Be Used Together</small></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Details</label>
                                    <textarea rows="3" name="details" class="form-control">{{ $booking->details }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary border rounded-0" type="submit" style="background-color: dodgerblue;border: none !important;">Confirm Booking</button>
                </form>
              </div>
            </div>
          
        </div>
        <div class="col-md-1"></div>
      </div>
	
</div>


@endsection