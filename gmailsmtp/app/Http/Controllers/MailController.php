<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(ValidateMail $request){

        $name = $request->name;
        $to_email = $request->email;
        $title = $request->title;

        $data = array('name'=>$request->name,"title" => $request->title, "body" => $request->body);

        Mail::send('email.mail', $data, function($message) use ($name, $to_email,$title) {

            $message->to($to_email, $name)->subject($title);
            $message->from('nebojsha.mitikj.97@gmail.com','Hello World');

        });


        return view('email.success');
    }
}
