<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Notifications\ChatSent;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        $notifications = array();
        foreach ($users as $user) {
            foreach (auth()->user()->Notifications as $notification) {
                if ($notification->data['sender_id'] == $user->id) {
                    array_push($notifications, $notification);
                    break;
                }
            }
        }
        return view('chat.index', compact('users', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $notifications = auth()->user()->Notifications;
        foreach ($notifications as $notification) {
            if ($notification->data['sender_id'] == $id) {
                $notification->markAsRead();
            }
        }
        $sender = User::findOrFail($id);
        $chats = Chat::where(['sender_id' => $id, 'recipient_id' => auth()->id()])
            ->orWhere(['sender_id' => auth()->id(), 'recipient_id' => $id])
            ->orderBy('created_at')
            ->get();
        return view('chat.create', compact('chats', 'sender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'recipient_id'=> 'required|exists:users,id'
        ]);

        $chat = Chat::create([
            'sender_id' => auth()->id(),
            'recipient_id'=> $request->recipient_id,
            'body' => $request->body
        ]);

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new ChatSent($chat));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
