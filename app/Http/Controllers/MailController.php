<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
            $m->to('andressa@dvelopers.com.br', 'Andressa')->subject('Contato com corretor');
        });

        return response()->json(['error'=>'0','status'=>'ok']);   
    }

    public function storeImovel(Request $request){
        $data = $request->all();
        $fotos = $request->input('fotos');
    
        $caracteristicas = $request->input('caracteristicas');
    
        Mail::send('emails.imoveis', ['caracteristicas' => $caracteristicas] + $data, function ($m) use ($data, $fotos) {
            $m->from($data['email'], env('SITE_NAME'));
            // $m->to($data['sendMail'], env('SITE_NAME'))->subject('Ficha de Financiamento');
            $m->to('andressa@dvelopers.com.br', 'Andressa')->subject('Formulário Cadastro Imóvel');
    
            // Anexar fotos
            foreach ($fotos as $fotoPath) {
                $fotoPath = public_path($fotoPath);
                $m->attach($fotoPath);
            }
        });
    
        return response()->json(['error'=>'0','status'=>'ok']);   
    }
          

    public function uploadform(Request $request){
        $arrayFiles = array();
    
        foreach($request->file('files') as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFiles[] = $fileName;
            $file->move('./upload/formulario/',$fileName);
        }
    
        return response()->json($arrayFiles);
    }

    public function storefinanciamento(Request $request){
        $data = $request->all();

        Mail::send('emails.financiamento', $data, function ($m) use ($data) {
            $m->from($data['email'], env('SITE_NAME'));
           // $m->to($data['sendMail'], env('SITE_NAME'))->subject('Ficha de Financiamento');
            $m->to('andressa@dvelopers.com.br', 'Andressa')->subject('Simulação de financiamento');
        });

        return response()->json(['error'=>'0','status'=>'ok']);   
    }
}
