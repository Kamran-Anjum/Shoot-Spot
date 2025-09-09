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
                <h5 class="font-medium text-uppercase mb-0">Customer Details</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
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
      <div class="col-md-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <a href="{{ url('/images/frontend-images/customer/'.$customer->image ) }}" >
                  <img src=" {{ asset('/images/frontend-images/customer/'.$customer->image ) }} " alt="customer" class="rounded-circle" width="250">
              </a>
              <div class="mt-3">
                <h4>{{ $customer->userName }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Customer Details</h4>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">First Name</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->first_name }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Last Name</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->last_name }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->phone_code }}{{ $customer->phone_number }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">E-mail</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->email }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Gender</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->gender }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Date Of Birth</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->date_of_birth }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Loyalty Points</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $customer->loyalty_points }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Status</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    @if($customer->isactive==1)
                        Active
                    @else
                        Not Active
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
