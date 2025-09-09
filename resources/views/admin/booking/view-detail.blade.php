@extends('layout.adminLayout.admin-design')
@section('content')
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Booking Details</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="page-content container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
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

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

    <div class="row gutters-sm">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Booking Details</h4>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Booking ID</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->booking_code }}{{ $booking->booking_no }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Status</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->status }} @if($booking->status == "Requested")| <a href="{{ url('/admin/send-quote/'.$booking->id) }}" class="btn btn-warning btn-mini text-white">Send Quotes</a>@endif
                    @if($booking->status == "Confirm Booking")| <a href="{{ url('/admin/assign-photographer/'.$booking->id) }}" class="btn btn-success btn-mini text-white">Assign Photographer</a>@endif
                    @if($booking->status == "Completed" && empty($booking->loyalty_points_to_user))| <a href="{{ url('/admin/add-loyalty-points/'.$booking->id) }}" class="btn btn-success btn-mini text-white">Add Loyalty Points</a>@endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Customer Name</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->userName }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->phone_code }}{{ $booking->phone_number }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">E-mail</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->email }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Loyalty Points</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->loyalty_points))
                      {{ $booking->loyalty_points }}
                    @else
                      No Points Yet
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Location</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->location }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Date</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->year }}-{{ $booking->month }}-{{ $booking->date }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Time</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->time }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Details</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->details }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Shoot For</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->shootfor_name }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Package Request</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $booking->pck_req_name }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Amount</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->amount))
                      {{ $booking->amount }}
                    @else
                      No Quote Yet
                    @endif
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Total Amount</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->total_amount))
                      {{ $booking->total_amount }}
                    @else
                      No Quote Yet
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Use PromoCode</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->promo_code))
                      {{ $booking->promo_code }}
                    @else
                      No
                    @endif
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Use Loyalty Points</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->redeem_loyalty_points))
                      {{ $booking->redeem_loyalty_points }}
                    @else
                      No
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Photographer Assigned</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->user_photographer_name))
                      {{ $booking->user_photographer_name }}
                    @else
                      Not Assigned Yet
                    @endif
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Added Loyalty Points To Customer</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->loyalty_points_to_user))
                      {{ $booking->loyalty_points_to_user }}
                    @else
                      Not Added
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Photographer Check In</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if(!empty($booking->user_photographer_check_in))
                      {{ $booking->user_photographer_check_in }}
                    @else
                      No Check In Yet
                    @endif
                  </div>
                </div>
                <hr>
              </div>
            </div>
          
        </div>
      </div>
    </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

@endsection
