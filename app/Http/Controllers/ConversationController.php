<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    //
    
    public function show($id)
    {
        $conversations = Conversation::where('user1_id', $id)
        ->orWhere('user2_id', $id)
        ->with(['user1', 'user2'])
        ->get();
        
        return response()->json($conversations);
    }
    
    public function store(Request $request)
    {
        $conversation = Conversation::create([
            'user1_id' => $request->user1_id,
            'user2_id' => $request->user2_id,
        ]);

        return response()->json($conversation, 201);
    }
}
