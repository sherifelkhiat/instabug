<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Application;

class ChatController extends Controller
{
    //
    public function index()
    {
        $chats = Chat::all();

        return response()->json(['success' => $chats]); 
    }

    public function create(Request $request)
    {
        $lastChat = Chat::orderBy('created_at', 'desc')->first();

        $chat = '';

        if($lastChat){
            $requestData = $request->all();
            
            $requestData['chat_number'] = $lastChat->chat_number + 1;

            $chat = Chat::create($requestData);
        } else {
            $requestData = $request->all();
            
            $requestData['chat_number'] = 1;

            $chat = Chat::create($requestData);
        }
        
        Application::where('id', $chat->application_id)
          ->update(['chats_count' => $chat->chat_number]);

        return response()->json(['success' => $chat]); 
    }
}
