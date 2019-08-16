<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Chat;

class MessageController extends Controller
{
    //
    public function index()
    {
        $messages = Message::all();

        return response()->json(['success' => $messages]); 
    }

    public function create(Request $request)
    {
        $lastMessage = Message::orderBy('created_at', 'desc')->first();

        $message = '';

        if($lastMessage){
            $requestData = $request->all();
            
            $requestData['message_number'] = $lastMessage->message_number + 1;

            $message = Message::create($requestData);
        } else {
            $requestData = $request->all();
            
            $requestData['message_number'] = 1;

            $message = Message::create($requestData);
        }
        
        Chat::where('id', $message->application_id)
          ->update(['messages_count' => $message->message_number]);

        return response()->json(['success' => $message]); 
    }
}
