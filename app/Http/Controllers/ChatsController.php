<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\PrivateMessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('status', 'active')->get();

        return view('chat.show', compact('users'));
    }

    /**
     * Show chats private
     *
     * @return \Illuminate\Http\Response
     */
    public function privateChat()
    {
        return view('chat.private');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::where('receiver_id', 0)->with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'user_id' => request()->user()->id,
            'receiver_id' => !empty(request('receiver_id')) ? request('receiver_id') : 0
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function privateMessages($id)
    {
        $privateCommunication= Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $id])
        ->orWhere(function($query) use($id){
            $query->where(['user_id' => $id, 'receiver_id' => auth()->id()]);
        })
        ->get();

        return $privateCommunication;
    }

    public function sendPrivateMessage(Request $request, $id)
    {
        $input=$request->all();
        // $input['receiver_id']=$user->id;
        $message=auth()->user()->messages()->create([
            'message' => $request->input('message'),
            'user_id' => request()->user()->id,
            'receiver_id' => $id
        ]);

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();
        
        return response(['status'=>'Message private sent successfully','message'=>$message]);
    }

    public function users()
    {
        return User::where('status', 'active')->with('staff')->get();
    }
}
