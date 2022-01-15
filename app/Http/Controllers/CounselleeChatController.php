<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseChatController;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;

class CounselleeChatController extends BaseChatController
{
    /**
     * The User Type using this controller
     * @var string
     */
    protected $userType = 'counsellee';

    /**
     * Establish a Chat between a Counsellee and a Counsellor
     * From the Counsellees Point of View
     *
     * @param Request $request
     * @return void
     */
    public function createChat(Request $request)
    {
        $this->validate($request, [
            'counsellee_id' => 'required|exists:users,id'
        ]);

        $user = auth()->user()->id;

        if (!$this->establishChat($request->counsellee_id, $user)) {
            return redirect()->back()->with('fail', 'Chat already established with counsellee');
        }

        return view('chat')->with('success', 'Chat have been succesfully established');
    }

    /**
     * Send a Message from A Counsellee to a Counsellor.
     *
     * @param Request $request
     * @return void
     */
    public function sendMessageToCounsellor(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|integer|exists:chats,id',
            'message' => 'required|max:1000',
            'replying_to' => 'sometimes',
            'counsellor_id' => 'required|exists:users,id'
        ]);

        if (!$this->sendMessage(
            $request->chat_id,
            $request->message,
            null,
            null,
            Auth::user()->id

        ))  return redirect()->back()->with('fail', 'Cannot send message at this time');

        return redirect()->back()->with('success', 'Sent a message to a counselle');
    }


    public function getAllMessagesInAChatWithCounsellor($id)
    {
        $messages = $this->getAllMessagesInAChat($id);
        $chat = Chat::find($id);

        return view('counsellee_messages', ['messages' => $messages, 'chat' => $chat]);
    }

    public function view()
    {
        $chats = $this->getCurrentUserChats($this->userType);

        return view('counsellee_chat', ['chats' => $chats]);
    }
}
