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
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Dashboard</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <!-- <button class="btn btn-danger text-white float-right ml-3 d-none d-md-block">Buy Ample Admin</button> -->
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- First Cards Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Photographer's</h5>
                                <a href="{{ url('/admin/view-photographers') }}">
                                    <div class="d-flex align-items-center mb-2 mt-4">
                                        <h2 class="mb-0 display-5"><i class="mdi mdi-camera-party-mode text-primary"></i></h2>
                                        <div class="ml-auto">
                                            <h2 class="mb-0 display-6"><span class="font-normal">{{ $count_photographer}}</span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Customer's</h5>
                                <a href="{{ url('/admin/view-customers') }}">
                                    <div class="d-flex align-items-center mb-2 mt-4">
                                        <h2 class="mb-0 display-5"><i class="icon-people text-primary"></i></h2>
                                        <div class="ml-auto">
                                            <h2 class="mb-0 display-6"><span class="font-normal">{{ $count_customer }}</span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Booking's</h5>
                                <a href="{{ url('/admin/view-bookings') }}">
                                    <div class="d-flex align-items-center mb-2 mt-4">
                                        <h2 class="mb-0 display-5"><i class="mdi mdi-calendar-check text-primary"></i></h2>
                                        <div class="ml-auto">
                                            <h2 class="mb-0 display-6"><span class="font-normal">{{ $count_booking }}</span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">New Contact Message's</h5>
                                <a href="{{ url('/admin/view-messages') }}">
                                    <div class="d-flex align-items-center mb-2 mt-4">
                                        <h2 class="mb-0 display-5"><i class="mdi mdi-message-text text-primary"></i></h2>
                                        <div class="ml-auto">
                                            <h2 class="mb-0 display-6"><span class="font-normal">{{ $count_msg }}</span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@endsection