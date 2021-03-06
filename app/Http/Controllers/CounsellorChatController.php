<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseChatController;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;


class CounsellorChatController extends BaseChatController
{
    /**
     * The User Type using this controller
     * @var string
     */
    protected $userType = 'counsellor';

    /**
     * Establish a Chat between a Counsellee and a Counsellor
     * From the Counsellor's Point of View
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

        if (!$this->establishChat($user, $request->counsellee_id)) {
            return redirect()->back()->with('fail', 'Chat already established with counsellee');
        } else {
            /* $user = auth()->user()->id;
            $chatId = Chat::firstWhere('counsellor_id', $user);*/
            return redirect()->back()->with('established', 'Chat has been established with counsellee');
        }
    }

    /**
     * Send a Message from A Counsellor to a Counsellee.
     *
     * @param Request $request
     * @return void
     */
    public function sendMessageToCounsellee(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|integer|exists:chats,id',
            'message' => 'required|max:1000',
            'replying_to' => 'sometimes',
            'counsellee_id' => 'required|exists:users,id'
        ]);

        if (!$this->sendMessage(
            $request->chat_id,
            $request->message,
            null,
            Auth::user()->id,
            null,
        )) {
            return redirect()->back()->with('fail', 'Cannot send message at this time');
        }

        return redirect()->back()->with('success', 'Sent a message to a counselle');
    }

    /**
     * Get all Messages inside a Chat using the Chat ID
     * @param $chatId
     */
    public function getAllMessagesInAChatWithCounsellee($id)
    {
        $messages = $this->getAllMessagesInAChat($id);
        $chat = Chat::find($id);

        return view('counsellor_messages', ['messages' => $messages, 'chat' => $chat]);
    }

    public function setMessageToRead($messageId)
    {
        $this->setMessageStatusToRead($messageId);

        //        return view
    }

    public function view()
    {
        $chats = $this->getCurrentUserChats($this->userType);

        return view('counsellor_chat', ['chats' => $chats]);
    }
}
