<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;


class ContatoController extends Controller
{
    public function index()
{
    return view('contato');
}
public function enviarEmail(Request $request)
{
    $email = $request->input('email');
    $mensagem = $request->input('mensagem');

    Mail::to('dede.ginevro@gmail.com')->send(new ContatoEmail($email, $mensagem));

    return redirect('/contato')->with('success', 'E-mail enviado com sucesso!');
}
}
