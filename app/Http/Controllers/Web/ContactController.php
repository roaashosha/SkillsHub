<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Message;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function index(){
        $data['setting']=Setting::select("email","phone")->first();
        return view("web.contact.index")->with($data);
    }

    public function send(Request $request){
        $request->validate([
            "name"=>"required|string|max:255",
            "email"=>"required|email|max:255",
            "subject"=>"nullable|string|max:255",
            "body"=>"required|string"
        ]);


        Message::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "body"=>$request->body
        ]);

        $data =["success"=>"Your message is sent successfully!"];
        return Response::json($data);


    }
}
