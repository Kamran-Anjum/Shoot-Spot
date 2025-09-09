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
                <h5 class="font-medium text-uppercase mb-0">Add Shoot For</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shoot-for.index') }}">Shoot For</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Shoot For</li>
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
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">

                @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-block">
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

                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ route('shoot-for.store') }}" > {{ csrf_field() }}
                            <div class="form-body">
                                <div  class="input_fields_wrap" >
                                    <div id="my">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="form-group ">
                                                    <label class="control-label">Name</label>
                                                    <!-- <button type="button" style="margin-left:26em; margin-bottom: 1em;" id="addfield-shoot-for" class=" btn btn-circle btn-success text-white btn-md"  > 
                                                    <i class="fa fa-plus" ></i>  </button> -->
                                                    <input type="text" id="name" name="name[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row " style="margin-bottom: 1em;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" id="image" name="image[]" class="form-control" placeholder="" style="margin-right:2em;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="radio" id="on" name="isactive[0]" value="1" checked="checked">
                                                    <label for="on" style="margin-right: 1em;">Active</label>
                                                    <input type="radio" id="off" name="isactive[0]" value="0">
                                                    <label for="off">Not Active</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                                <a href="{{route('shoot-for.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
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
<!-- 
-->

@endsection
