@extends('layouts.app')

@section('content')
    <h1>List Messages</h1>
    <div>
        <a href="{{route('message.create')}}" class="btn btn-primary"> create a new message </a>
    </div>
    <hr/>
    @if(count($messageList) > 0)
        <ul>
            @foreach($messageList as $msg)
                <div class="list-group-item">
                    <div class="border-white shadow" >
                        <div class="align-content-start">
                            <small>{{$msg->id}}</small>
                            <h3>{{$msg->user->name}} says : </h3>
                            <p class="class="p-1">{{$msg->message}}</p>
                            <p><b>{{$msg->replies->count()}}</b> replies.</p>
                            <div class="align-content-right">
                                <a href="{{route('message.show', $msg->id)}}" class="btn btn-primary btn-small">view message</a>
                            </div>
                            <small>{{$msg->created_at->diffForHumans()}}</small>+
                            <hr/>
                            @if (Auth::id() == $msg->user->id)
                                <a href="{{route('message.delete', $msg->id)}}" class="btn btn-outline-secondary">delete</a>
                                <a href="{{route('message.edit', $msg->id)}}" class="btn btn-outline-secondary">edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $messageList->links() }}
        </ul>
    @else
        <p>Create a new message first</p>
    @endif
@endsection