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
                <h5 class="font-medium text-uppercase mb-0">List Bookings</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Bookings</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
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
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Customer Name</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Shoot For</th>
                                        <th>Package Request</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php $i = 0; ?>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{$booking->userName}}</td>
                                            <td>{{$booking->location}}</td>
                                            <td>{{$booking->full_date}}</td>
                                            <td>{{$booking->time}}</td>
                                            <td>{{$booking->shootfor_name}}</td>
                                            <td>{{$booking->pck_req_name}}</td>
                                            <td>{{$booking->total_amount}}</td>
                                            <td>{{$booking->status}}</td>
                                           
                                            <td class="center">
                                                @if($booking->status == "Requested")
                                                    <a href="{{ url('/admin/send-quote/'.$booking->id) }}" class="btn btn-warning btn-mini text-white">Send Quotes</a>
                                                @endif
                                                @if($booking->status == "Confirm Booking")
                                                    <a href="{{ url('/admin/assign-photographer/'.$booking->id) }}" class="btn btn-success btn-mini text-white">Assign Photographer</a>
                                                @endif
                                                @if($booking->status == "Completed" && empty($booking->loyalty_points_to_user))
                                                    <a href="{{ url('/admin/add-loyalty-points/'.$booking->id) }}" class="btn btn-success btn-mini text-white">Add Loyalty Points</a>
                                                @endif
                                                <a href="{{ url('/admin/view-booking-detail/'.$booking->id) }}" class="btn btn-primary btn-mini">View Details</a>
                                               <!-- <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="" param-route="photographer" href="javascript:">Delete</a></button> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                        <th>S No.</th>
                                        <th>Customer Name</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Shoot For</th>
                                        <th>Package Request</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                </tfoot>
                            </table>
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
