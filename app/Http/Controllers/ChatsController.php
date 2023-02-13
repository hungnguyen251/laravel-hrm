<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Services\MessageService;

class ChatsController extends Controller
{
    protected $message;

    public function __construct(MessageService $messages)
    {
        $this->message = $messages;
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->message->getAll();

        return view('chat.show', compact('users'));
    }

    /**
     * Show chats private
     *
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
        return $this->message->fetchAllMessages();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     */
    public function sendMessage(Request $request)
    {
        return $this->message->sendMessageToAll($request);
    }

    /**
     * Get private message
     *
     */
    public function privateMessages($id)
    {
        return $this->message->getPrivateMessages($id);
    }

    /**
     * Persist private message to database by  $id
     *
     * @param  Request $request
     */
    public function sendPrivateMessage(Request $request, $id)
    {
        return $this->message->handleSendPrivateMessage($request, $id);
    }

    /**
     * Get all users
     *
     */
    public function users()
    {
        return $this->message->getAllUsers();
    }
}
