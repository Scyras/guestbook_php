@extends('layouts.app')

@section('content')
   <div class="container">
       <h1>A message from {{$msg->user->name}}</h1>
       <p class="lead">{{$msg->message}}</p>
       <p class="text-dark">user raiting {{$msg->rating}}/5</p>
       <hr/>
       @if($msg->replies->count() > 0)
            <h2>Replies</h2>
            @foreach($msg->replies as $reply)
                <div class="panel panel-default shadow">
                    <div class="panel-body">
                        <p class="p-2">{{$reply->reply_text}}</p>
                        <small>{{$reply->user->name}} replied on {{$reply->updated_at}}</small>
                    </div>
                </div>
                <hr/>
           @endforeach
       @else
           <p>
               No replies yet. <br/>
               Be the first to reply.
           </p>
           <hr/>
       @endif

       @if(Auth::user()->access_level > 1)

           {{--       add a reply--}}
           <form action="{{route('replyMessages.store')}}" method="POST">
               {{csrf_field()}}
               <h4>Add a reply</h4>
               <textarea class="form-control" name="replyText" rows="4"></textarea>
               <input type="hidden" value="{{ $msg->id }}" name="messageId">
               <button class="btn btn-primary">Submit Reply</button>
           </form>
       @endif
   </div>
@endsection