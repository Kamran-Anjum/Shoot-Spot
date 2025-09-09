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
      <div class="col-md-12 col-sm-12">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Messages</h4>
                <hr>
                <div class="table-responsive">
    					<table id="zero_config" class="table table-striped border">
    						<thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Resent Chats</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        		<?php $c = 0; ?>
                                @foreach($getchatlist as $list)
	    							@for ($i = 0; $i < count($list['members']); $i++)
                                        @if($list['members'][$i] == Auth::user()->id)
		                            		<tr>
				    							<td>{{ ++$c }}</td>
				    							<td>
				    								<?php $customer = $list['members'][0] ?>
				    								<?php $me = $list[$customer] ?>
			    									{{ $me['userName'] }}
				    							</td>
				    							<td>
				    								<a href="{{ url('/photographer/chats/'.$list['chatId'].'/'.$customer) }}" class="btn btn-primary btn-mini">Go To Chat</a>
				    							</td>
		    								</tr>
                                        @endif
									@endfor
                                @endforeach
                            </tbody>
    					</table>
    				</div>
              </div>
            </div>
          
        </div>
      </div>
	
</div>


@endsection