<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'about']]);
    }

    // title screen
    public function index()
    {
       return view('guestbook.index');
    }

    public function about()
    {
        return view('guestbook.about');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('profile')->with('user',$user);
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail($request->userId);

        // validate user input/form data
        $this->validate($request, [
            'userId' => 'required|integer',
            'accessLevel' =>'required|integer|min:1|max:2'
        ]);

        $user->access_level = $request->accessLevel;
        if($user->save()) {
            return view('profile')->with('user', $user);
        }
        else
        {
            return abort(404);
        }
    }

}
