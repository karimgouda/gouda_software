<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat()
    {
        $data['rows'] = Chat::where('user_id',Auth::id())->get();
        return view('frontend.chat')->with($data);
    }
    public function create(ChatRequest $request)
    {
        if ($request->ajax()){
            $data = new Chat();
            $data->message = $request->message;
            $data->user_id = Auth::id();
            $data->save();

            $respond['row'] =  $data;
            return view('frontend.row')->with($respond);

        }
    }
}
