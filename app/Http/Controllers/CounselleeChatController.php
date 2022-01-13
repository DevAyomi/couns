<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseChatController;

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
            'counsellor_id' => 'required|exists:users,id'
        ]);

        if (!$this->establishChat($request->counsellor_id, auth()->id()))
            return $this->badRequestAlert("Chat already established with Counsellor");

        return $this->successResponse("Chat established successfully with a Counsellor");
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
            $request->counsellor_id,
            null,
            auth()->id()
        )) return $this->badRequestAlert("Cannot send messages at this time");

        return $this->successResponse("Sent a message to the Counsellor");
    }


    public function getAllMessagesInAChatWithCounsellor($chatId)
    {
        $messages = $this->getAllMessagesInAChat($chatId);

        // return view
    }

}
