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
                <h5 class="font-medium text-uppercase mb-0">Edit Promo Code</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promo-code.index') }}">Promo Code</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Promo Code</li>
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
        <style>
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 35px;
            }
            .select2-container .select2-selection--single {
                box-sizing: border-box;
                cursor: pointer;
                display: block;
                height: 35px;
                user-select: none;
                -webkit-user-select: none;
            }
            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #e9ecef;
                border-radius: 4px;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow b {
                border-color: #888 transparent transparent transparent;
                border-style: solid;
                border-width: 5px 4px 0 4px;
                height: 0;
                left: 50%;
                margin-left: -4px;
                margin-top: -2px;
                position: absolute;
                top: 60%;
                width: 0;
            }
            .select2-container--default .select2-selection--multiple {
                background-color: white;
                border: 1px solid #e9ecef;
                border-radius: 4px;
                cursor: text;
            }
            .select2-container--default.select2-container--focus .select2-selection--multiple {
                border:  1px solid rgba(0,0,0,.25);
                outline: 0;
            }
        </style>
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
                        <form action="{{route('promo-code.update',$code->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                            <div class="form-body">
                               <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Code</label>
                                            <input type="text" name="code"  class="form-control" value="{{$code->code}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Amount</label>
                                            <input type="number" name="amount"  class="form-control" value="{{$code->amount}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Type</label>
                                             <select name="type" id="type" class="form-control select2 custom-select" required="">
                                                @if($code->type == "Percentage")
                                                    <option selected="" value="Percentage">Percentage</option>
                                                    <option value="Fixed">Fixed</option>
                                                @else
                                                    <option value="Percentage">Percentage</option>
                                                    <option selected="" value="Fixed">Fixed</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Active From</label>
                                            <input type="date" name="active_from" class="form-control" value="{{$code->active_from}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Expire Date</label>
                                            <input type="date" name="expire_date" class="form-control" value="{{$code->expire_date}}">
                                        </div>
                                    </div>
                                </div>
                                @if($code->isactive==1)
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
                                <a href="{{route('promo-code.index')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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
