@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Welcome back {{$message->user->name}}. </h1>
        <hr/>
        <p>Do you want to edit your message?</p>
        <form action="{{route('message.update')}}" method="post">
            {{--  the security token thing ... Csrf token is needed  {{ csrf_field() }} --}}
            {{ csrf_field() }}
            <input type="hidden" value="{{ $message->id }}" name="messageId" id="messageId"/>
            <label for="messageText">Your message:</label>
            <textarea name="messageText" id="messageText" class="form-control" rows="4" >{{$message->message}}
            </textarea>
            <div >
                <label for="rating" class="text-info">Rating: (0 = poor -> 5 = awesome) </label>

                <div class="d-flex my-4">
                    <span class="font-weight-bold blue-text mr-2 mt-1">0</span>
                    <input class="border-0" type="range" min="0" max="5" id="ratingValue" name="ratingValue" value="{{$message->rating}}" />
                    <span class="font-weight-bold blue-text ml-2 mt-1">5</span>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Say it, again"/>
        </form>
    </div>

@endsection
