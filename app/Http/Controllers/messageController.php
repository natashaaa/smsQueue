<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

use Response;

class messageController extends Controller
{
    //get all SMS messages in the storage in JSON format
    public function index(){
 
        $getmessage = Message::select('title', 'message')->get();

        return Response::json($getmessage);
    }

    //insert an SMS Message into 
    public function create(Request $request){

        if(empty($request->message) && empty($request->title)){
            return Response::json(['message' => 'Title and SMS message is empty'], 400);
        }
        
        $createMessage = Message::create([
            'title' => $request->title,
            'message' => $request->message,
        ]);
        return Response::json($createMessage);

    }

    //get the total number of messages in the storage 
    public function count(){

        $gettotalmessage = Message::count('message');

        return Response::json(['total_sms_messages' => $gettotalmessage]);
    }

    //read an SMS Message from the storage and returns it in JSON format (FIFO)

    public function read(){

        $message = Message::orderBy('created_at')->first();

        if ($message) {
            $message->delete();
            return Response::json($message);
        } else {
            return Response::json(['message' => 'No SMS messages available'], 404);
        }


    }
}
