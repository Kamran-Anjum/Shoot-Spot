@extends('layout.adminLayout.admin-design')
@section('content')<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Edit Package Request</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('package-request.index') }}">Package Request</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Package Request</li>
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


                        <form action="{{route('package-request.update',$request->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                       
                            <div class="form-body">

                               <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name"  class="form-control" value="{{$request->name}}">
                                        </div>
                                    </div>
                                </div>
                               
                                @if($request->isactive==1)
                                    <input type="radio" id="on" name="isactive" value="1" checked="checked">
                                    <label for="on" style="margin-right: 1em;">Active</label>
                                    <input type="radio" id="off" name="isactive" value="0">
                                    <label for="off">Not Active</label>
                                @else
                                    <input type="radio" id="on" name="isactive" value="1" >
                                    <label for="on" style="margin-right: 1em;">Active</label>
                                    <input type="radio" id="off" name="isactive" value="0" checked="checked">
                                    <label for="off">Not Active</label>
                                
                                @endif

                              
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Save</button>
                                <a href="{{route('package-request.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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
