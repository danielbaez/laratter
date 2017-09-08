<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
    	return view('messages.show', ['message' => $message]);
    }

    public function create(CreateMessageRequest $request)
    {
    	/*$this->validate($request, [
    		'message' => ['required', 'max:160']
    	], [
    		'message.required' => 'Por favor escribe tu mensaje',
    		'message.max' => 'El mensaje no puede superar los 160 caracteres'
    	]);*/

		$message = Message::create([
			'content' => $request->get('message'),
			'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000)
		]);

    	return redirect('/messages/'.$message->id);
    }

    // public function create(CreateMessageRequest $request)
    // {
    //     $message = Message::create([
    //         'content' => $request->input('message'),
    //         'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000)
    //     ]);

    //     return redirect('/messages/'.$message->id);
    // }
}
