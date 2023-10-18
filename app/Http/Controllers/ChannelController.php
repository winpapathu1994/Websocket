<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;
use App\Models\Message;
class ChannelController extends Controller
{

    /**
     * Channel Broadcast.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chatMessage(Request $request)
    {
      $message = new Message();
      $message->user_id = auth()->user()->id;
      $message->body = $request->message;
      $message->save();

      event(new ChatMessageEvent($request->message, auth()->user()));
      return null;

    }

     /**
     * All message
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function allMessages(Request $request)
    {
      $messages = Message::select('messages.body', 'users.name')
      ->join('users', 'users.id', '=', 'messages.user_id')
      ->get();
      $authUser = auth()->user()->email;

      return view('websocket',compact("messages","authUser"));
    }
}
