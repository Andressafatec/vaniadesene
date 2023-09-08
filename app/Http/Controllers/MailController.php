<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        return view("site.mail");
    }
    public function store(Request $request){
        $data = $request->all();

        Mail::send('emails.corretor', $data, function ($m) use ($data) {
            $m->from($data['email'], env('SITE_NAME'));
           // $m->to($data['sendMail'], env('SITE_NAME'))->subject('Ficha de Financiamento');
            $m->to('andressa@dvelopers.com.br', 'Andressa')->subject('teste corretor');
        });

        return 'enviado';

    }
}
