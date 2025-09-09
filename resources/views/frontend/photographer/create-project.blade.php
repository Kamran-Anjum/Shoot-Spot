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
      <div class="col-md-1 "></div>
      <div class="col-md-10 col-sm-12">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Create Project</h4>
                <hr>
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/photographer/create-project' ) }}" >{{ csrf_field() }}
                	<div class="form-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input type="text" name="location" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Shoot for</label>
                                    <select id="shoot_for_id" name="shoot_for_id" required="" class="form-control">
                                        @foreach($shoot_fors as $shoot_for)
                                            <option value="{{ $shoot_for->id }}">{{ $shoot_for->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Portfolio Link</label>
                                    <input type="text" name="portfolio_link" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea name="description" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="file_fields_wrap">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image[]" required=""  class="form-control" >
                                    </div>
                                </div>
                                <button style="margin-top: 33px; height: 35px;" class="fa fa-plus add_file_field_button btn btn-primary">Add</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-actions mt-5">
                        <button type="submit" class="btn_user_profile"> <i class="fa fa-check"></i> Add</button>
                        <a href="{{url('/photographer/index')}}"><button type="button" class="btn_user_profile">Cancel</button></a>
                    </div>

                </form>
              </div>
            </div>
          
        </div>
        <div class="col-md-1"></div>
      </div>
	
</div>


@endsection