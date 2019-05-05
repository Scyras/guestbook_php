<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dbMessageList = Message::orderby('updated_at','desc')
            ->paginate(5);
        return view('message.index')
            ->with('messageList', $dbMessageList);
    }

    // create a new message
    public function create()
    {
        $dbMessage = new Message();

        $dbMessage->message = "";
        $dbMessage->rating = 2;

        return view('message.create')
            ->with('message',$dbMessage);
    }

    // save a message
    public function store(Request $request)
    {
        $this->doesMessagePassBasicInputValidation($request);

        // process the data
        $msg = new Message();
        $msg->message = $request->messageText;
        $msg->rating = $request->ratingValue;
        $msg->user()->associate(Auth::user()->id);

        if ($msg->save()) {

            return redirect()->route('message.show', $msg->id);
        }
        else
        {
            // failed
            return redirect()->route('message.create');
        }
    }

    // create a new message
    public function delete($id)
    {
        $dbMessage = Message::find($id);

        return $dbMessage;
    }

    // edit a message
    public function edit($id)
    {
        $dbMessage = Message::find($id);
        if ($dbMessage->user->id != Auth::user()->id)
        {
            return abort(403);
        }
        return view('message.edit')
            ->with('message',$dbMessage);
    }


    public function show($id)
    {
        $dbMsg = Message::findOrFail($id);

        return view('message.show')->with('msg',  $dbMsg);
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
        $msg = Message::findOrFail($request->messageId);

        if ($msg->user->id != Auth::user()->id)
        {
         return abort(403);
        }

        // validate user input/form data
        $this->doesMessagePassBasicInputValidation($request);

        $msg->message = $request->messageText;
        $msg->rating = $request->ratingValue;

        if ($msg->save()) {

            return redirect()->route('message.index', $msg->id);
        }
        else
        {
            // failed
            return redirect()->route('message.edit');
        }
    }

    private function doesMessagePassBasicInputValidation(Request $request)
    {
        // validate user input/form data
        return $this->validate($request, [
            'messageText' => 'required|min:3|max:500',
            'ratingValue' =>'required|integer|min:0|max:5'
        ]);
    }
}
