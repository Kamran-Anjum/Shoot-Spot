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
      <div class="col-md-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              	<img src=" {{ asset('/images/frontend-images/photographer/'.$photographer->image ) }} " alt="photographer"  width="150">
              <div class="mt-3">
                <h4>{{ $photographer->first_name }}  {{ $photographer->last_name }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">About</h4>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">First Name</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->first_name }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Last Name</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->last_name }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->phone_code }}{{ $photographer->phone_number }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">E-mail</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->email }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Date Of Birth</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->date_of_birth }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Gender</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->gender }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Experience</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->experience }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->address }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">3D Equipment</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->eqp_name }}
                  </div>
                  <div class="col-sm-2">
                    <h6 class="mb-0">3D Spaces</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->spaces_name }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  @if(!empty($photographer->equip_other_name))
                    <div class="col-sm-2">
                      <h6 class="mb-0">Equipment Other Name</h6>
                    </div>
                    <div class="col-sm-4 text-secondary">
                      {{ $photographer->equip_other_name }}
                    </div>
                  @endif
                  <div class="col-sm-2">
                    <h6 class="mb-0">Bio</h6>
                  </div>
                  <div class="col-sm-4 text-secondary">
                    {{ $photographer->bio }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3 col-sm-3">
                    <a href="{{ url('/photographer/edit-profile') }}" class="btn_user_profile">Edit Profile</a>
                  </div>
                  <div class="com-md-3 col-sm-4">
                  	<a href="{{ url('/photographer/change-password') }}" class="btn_user_profile">Change Password</a>
                  </div>
                </div>
                <hr>
              </div>
            </div>
          
        </div>
      </div>
	
</div>


@endsection