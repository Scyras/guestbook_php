@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>{{$user->name}}'s profile</h1>
        @if (Auth::user()->id == $user->id)
            <div class="card shadow">
                <form id="update-profile-form" action="{{ route('profile.store') }}" method="post" >
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="userId" id="userId"/>
                    <p>
                        <b>Access Level:</b>  {{$user->access_level}} (higher the value the more POWER)
                        <br/> 1 = can create messages.
                        <br/> 2 = can reply to messages.
                    </p>
                    <div class="d-flex my-4">
                        <span class="font-weight-bold blue-text mr-2 mt-1">1</span>
                        <input class="border-0" type="range" min="1" max="2" id="ratingValue" value="{{$user->access_level}}" name="accessLevel"/>
                        <span class="font-weight-bold blue-text ml-2 mt-1">2</span>
                    </div>
                    <div class="m-1">
                        <input type="submit" class="btn btn-primary" value="Update profile"/>
                    </div>
                </form>
            </div>
            <hr/>
        @endif
        <p>
            see what {{$user->name}} did.
        </p>

        <hr/>

        <div class="row">
            <div class="col-md-12">
                <h1>
                    Replies made:
                </h1>
                @foreach($user->replyMessages as $reply)
                    <div class="card">
                        <div class="card-header">
                            <b>Message:</b>
                            <p class="card-title"> {{$reply->message->message}}</p>
                        </div >
                        <div class="card-body">
                            <div>
                                <b>Reply:</b>
                                <p class="card-text">{{$reply->reply_text}}</p>
                                <small>{{$reply->update_at}}</small>
                            </div>
                        </div>
                    </div>
                    <hr/>
                @endforeach
            </div>

        </div>

    </div>
@endsection

