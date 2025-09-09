@extends('layout.userLayout.design')
@section('content')

<style>
    .chat-container {
        display: flex;
        flex-direction: column;
        height: 400px;
        overflow-y: auto;
    }

    .chat {
        border: 0.5px gray;
        border-radius: 5px;
        width: auto;
        padding: 0.5em;
    }

    .chat-left {
        background-color: #ededf0;
        align-self: flex-start;
    }

    .chat-right {
        background-color: #3f9ae5;
        align-self: flex-end;
    }

</style>

<div class="container" style="margin-top: 30px; margin-bottom: 30px;" >
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">Chat</div>

                <div class="card-body">
                    <div class="chat-container">
                        @foreach($query as $chat )
                            @if($chat['sender'] == auth()->user()->id)
                                <p class="chat chat-right">
                                    <b>You :</b><br>
                                    {{$chat['message']}}                                    
                                </p>
                            @else
                                <p class="chat chat-left">
                                    @foreach($users as $user)
                                        @if($user->id == $chat['sender'])
                                            <b>{{ $user->name }} :</b><br>
                                        @endif
                                    @endforeach
                                    {{$chat['message']}}
                                </p>
                            @endif
                        @endforeach
                    </div>
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" name="message" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

