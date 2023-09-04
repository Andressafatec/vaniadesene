<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;

class MailController extends Controller
{
    public function store(Request $request){
        $name = $request->name;
        $tel = $request->tel;
        $email = $request->email;
        $mensagem = $request->mensagem;

        $data = [
            $name,
            $tel,
            $mensagem

        ];

        Mail::to($email)->send(new Mail($data));

        dd(aaaaa);
    }
}
