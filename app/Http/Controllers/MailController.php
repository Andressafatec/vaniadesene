<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        return view("site.mail");
    }
    public function store(Request $request){
        $name = $request->name;
        $tel = $request->tel;
        $email= $request->email;
        $message = $request->message;

        $data = [
            'nome' => $name,
            'telefone' => $tel,
            'mensagem' => $message
        ];

        $mail = new SendMail($data);

        Mail::to($email)->send($mail);

        //dd(aaaa);

    }
}
