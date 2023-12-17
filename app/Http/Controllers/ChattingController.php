<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Message;
use App\Models\User;

class ChattingController extends Controller
{
    /**
     * Display the view for fetching and viewing messages
     * Render chat view, allowing user to view and interect with list and send message.
     */
    function index(){
        $message = Message::with('user')->select('id','message_text','sender_id','receiver_id')->where('sender_id',request()->user()->id)->take(30);
        return view('chat.messages',compact('message'));
    }

    public function send(Request $request)
    {   
        $user = User::select('id')->get()->map(function($user) use($request){
            return [
                'sender_id' => $request->user()->id,
                'receiver_id' => $user->id,
                'message_text' => $request->message,
            ];
        })->toArray();
        Message::insert($user);
        // dd($user);
        // $requestData['sender_id'] = $request->user()->id;
        // $requestData['receiver_id'] = 12;
        // $requestData['message_text'] = $request->message;
        // Message::create($requestData);
        // $message = $request->input('message');
        return redirect()->back();
        // return response()->json(['status' => 'Message Sent!']);
    }
}
