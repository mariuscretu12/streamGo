<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Message;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:2',
            'body' => 'required|max:255',
        ]);

        $author = Author::create([
            'name' => $request->name,
        ]);

        Message::create([
            'author_id' => $author->id,
            'body' => $request->body
        ]);


        return response()->json([
            "message" => "Author created"
        ], 201);
    }


}
