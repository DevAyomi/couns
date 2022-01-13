<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseChatController;

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

        if (!$this->establishChat($request->counsellee_id, auth()->id()))
            return $this->badRequestAlert("Chat already established with Counsellee");

        return $this->successResponse("Chat established successfully with a Counsellee");
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
            $request->counsellee_id,
            null,
            auth()->id()
        )) return $this->badRequestAlert("Cannot send messages at this time");

        return $this->successResponse("Sent a message to the Counsellor");
    }

    /**
     * Get all Messages inside a Chat using the Chat ID
     * @param $chatId
     */
    public function getAllMessagesInAChatWithCounsellee($chatId)
    {
        $messages = $this->getAllMessagesInAChat($chatId);

        // return view
    }

    public function setMessageToRead($messageId)
    {
        $this->setMessageStatusToRead($messageId);

//        return view
    }
}
