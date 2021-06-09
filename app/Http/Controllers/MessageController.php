<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id = null){

        if($id){
            $messages = Message::where('author_id',$id)->get();
        }else{
            $messages = Message::all();
        }

        return view('welcome')->with(compact('messages'));
    }
}
