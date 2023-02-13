<?php

namespace App\Services;

use App\Events\MessageSent;
use App\Events\PrivateMessageSent;
use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class MessageService
{
    /**
     * Show chats
     *
     */
    public function getAll()
    {
        return User::where('status', 'active')->get();
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchAllMessages()
    {
        return Message::where('receiver_id', 0)->with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     */
    public function sendMessageToAll(Request $request)
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

    public function getPrivateMessages($id)
    {
        $privateCommunication= Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $id])
        ->orWhere(function($query) use($id){
            $query->where(['user_id' => $id, 'receiver_id' => auth()->id()]);
        })
        ->get();

        return $privateCommunication;
    }

    public function handleSendPrivateMessage(Request $request, $id)
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

    public function getAllUsers()
    {
        return User::where('status', 'active')->with('staff')->get();
    }
}