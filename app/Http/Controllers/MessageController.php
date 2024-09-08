<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function show($id) 
    {
        $messages = Message::where('conversation_id', $id)->get();

        return response()->json($messages);
    }

    public function store($id, Request $request) 
    {
        $messages = Message::create([
            'conversation_id' => $id,
            'sender_id' => $request->sender_id,
            'content' => $request->content
        ]);

        return response()->json($messages, 201);
    }
}
