<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReplyMessage;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ReplyMessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['replyText'=>"required|min:10",
        'messageId' => "required|integer"]);

        $reply = new ReplyMessage();
        $reply->reply_text = $request->replyText;
        $reply->user()->associate(Auth::user()->id);

        $message = Message::findOrFail($request->messageId);


        $message->replies()->save($reply);

        return redirect()->route('message.show',$request->messageId);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reply = ReplyMessage()::FindOrFail($id);
        if ($reply->user->id != Auth::user()->id)
        {
            return abort(403);
        }

        return abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,['replyText'=>"required|min:10",
            'messageId' => "required|integer"]);

        $reply = ReplyMessage()::findOrFail($request->messageId);

        if ($reply->user->id != Auth::user()->id)
        {
            return abort(403);
        }

        $reply->reply_text = $request->replyText;

        $reply->save();

        return redirect()->route('message.show',$request->messageId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
