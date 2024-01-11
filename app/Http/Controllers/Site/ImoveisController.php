<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Corretores;
use App\Models\CorretoresImoveis;
use App\Models\Fotos;
use App\Models\Videos;
use App\Models\Imoveis;
use App\Models\Corretor;
use App\Models\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;
use GuzzleHttp\Psr7\Header;
use Illuminate\Support\Str;

class ImoveisController extends Controller
{
    public function index(Request $request,$contrato = null)
    {
      
      
        $imoveis = Imoveis::query();
  
        if ($contrato || $request->filled('contrato')) {
            if($request->filled('contrato')){
                $imoveis->whereIn('contrato', $request->input('contrato'));
            }else{
                $imoveis->where('contrato', Helper::corrigiAcento($contrato));
            }
        }
        if ($request->filled('codigo')) {
            $imoveis->where('referencia_original', $request->input('codigo'));
        }
        if ($request->filled('compras')) {
            $imoveis->where('contrato', $request->input('compras'));
        }
        if ($request->filled('tipo')) {
            $imoveis->where('tipo', $request->input('tipo'));
        }
        if ($request->filled('finalidade')) {
            $imoveis->where('finalidade', $request->input('finalidade'));
        }
        if ($request->filled('cidade')) {
            $imoveis->where('cidade', $request->input('cidade'));
        }
        if ($request->filled('bairro')) {
            $imoveis->where('bairro', $request->input('bairro'));
        }
        if ($request->filled('valormin') && $request->filled('valormax')) {
            $valormin = str_replace(',', '.', str_replace('.', '', $request->input('valormin')));
            $valormax = str_replace(',', '.', str_replace('.', '', $request->input('valormax')));
            $imoveis->whereBetween('valor', [$valormin, $valormax]);
        }

        if ($request->filled('valor')) {
            $valor = str_replace(',', '.', str_replace('.', '', $request->input('valor')));

            if($valor == '1.00'){
                $imoveis->where('valor', '>', $valor);
            }else{
                $imoveis->whereBetween('valor', ['0.00', $valor]);
            }

        }
        
        if ($request->filled('caracteristicas')) {
            $imoveis->whereHas('caracteristicas', function($q) use ($request) {
                foreach ($request->input('caracteristicas') as $k => $v) {
                    $q->where('pref', $k);
                    if ($v == 4) {
                        $q->where('valor', '>=', $v);
                    } else {
                        $q->where('valor', $v);
                    }
                }
            });
        }
        if ($request->filled('are_min') || $request->filled('area_max') ) {
            $area_min = 0;
            $area_max = Imoveis::select('valor')->orderBy('valor','desc')->first()->valor;
            if($request->input('are_min') != ""){
                $area_min = $request->input('are_min');
            }
            if($request->input('area_max') != ""){
                $area_max = $request->input('area_max');
            }
            $imoveis->whereHas('caracteristicas', function($q) use ($request,$area_min,$area_max) {
                $q->where('pref','ARU')->whereBetween('valor',[ $area_min, $area_max]);
            });
        }
        
        $imoveis = $imoveis->orderByRaw('RAND()')->paginate(18);
        if($imoveis->count() == 0 && $request->filled('codigo') && !$request->ajax() ){
            return $this->localizando($request,  $request->input('codigo'));
        }
          if($imoveis->count() == 1 && $request->filled('codigo')  && !$request->ajax()){
            return redirect()->route('site.imoveis.detalhes',['referencia_original'=>$request->input('codigo')]);

          }
        if($request->ajax()){
       
            return view("site.imoveis._lista_result", compact('imoveis','contrato'));
        }else{
            return view("site.imoveis.index", compact('imoveis','contrato'));
        }
    }
    public function detalhes($id)
    {
        $imovel = Imoveis::where('referencia_original',$id)->first();

        $corretoresImoveis = CorretoresImoveis::where('imovel_id', $imovel->id)->first();

        if ($corretoresImoveis) {
            $corretorId = $corretoresImoveis->corretor_id;
            $corretor = Corretores::find($corretorId);
        } else {
            $corretor = null;
        }

    	$endereco = $imovel->rua .' - '. $imovel->bairro . " - " . $imovel->cidade . " - " . $imovel->cep;

        return view("site.imoveis.imoveis_detalhes", compact('imovel', 'endereco', 'corretor'));
    }
    public function localizando(Request $request,$ref){
        return view('site.imoveis.localizando',compact('ref'));
    }
    public function cadastraImovel(Request $request,$ref){

        $xml = simplexml_load_file('https://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?ref='.$ref.'&op=2&idsessao=Aas243vAD1fdsf32&conta=6&carrega=1&empre=2');

        $arrayFinalidades = ['finalidade_0' => 'Residencial',
                                'finalidade_1' => 'Comercial',
                                'finalidade_2' => 'Estabelecimento',
                                'finalidade_3' => 'Res/Com',
                                'finalidade_4' => 'Lazer',
                                'finalidade_5' => 'Renda'];


        $arrayContrato = array('contrato_1'=>'Venda','contrato_2'=>'Locação','contrato_3'=>'Empreendimento');
        $value = $xml;
       
       if($value->status->id == "0"){
 
         return response()->json(['status'=>'erro']);
       }
    

        
        if($arrayFinalidades['finalidade_'.$value->finalidade]){
            $finalidade = $arrayFinalidades['finalidade_'.$value->finalidade];
        }else{
            $finalidade =$value->finalidade;
        }
       
    
        
            $ref = explode("-",$value->referencia);
                $ref = end($ref);
        
                $valorImovel = '';
            
   
           
           
                $valorImovel = substr($value->valor, 0, -2);
                $valorImovel = number_format((int) $valorImovel,2, '.', '');
                
                
              
                $valoriptu = str_replace(".",'',$value->valoriptu);
                $valoriptu = str_replace(",",'.',$valoriptu);
                $valorcondominio = str_replace(".",'',$value->valorcondominio);
                $valorcondominio = str_replace(",",'.',$valorcondominio);


                if($value->bairro == "BOSQUE DOS EUCALIPTOS FINAL DO BOSQUE BOSQUE DOS EUCALIPTOS" || 
                    $value->bairro == "BOSQUE DOS EUCALIPTOS JARDIM SATELITE BOSQUE DOS EUCALIPTOS"){
                    $bairro = "BOSQUE DOS EUCALIPTOS";
                }else{
                     $bairro = $value->bairro;
                }
               
                $imovelId = Imoveis::create([
                                "anuncio"=>$value->anuncio,
                                "titulo"=>$value->titulo,
                                "tipoanuncio"=>$value->tipoanuncio,
                                "valor"=>$valorImovel,
                                "valorcondominio"=>$valorcondominio,
                                "valoriptu"=>$valoriptu,
                                "bairro"=>$bairro,
                                "cidade"=>$value->cidade,
                                "uf"=>$value->uf,
                                "contrato"=>$arrayContrato['contrato_'.$value->contrato],
                                "detalhes"=>$value->detalhes,
                                "empresa"=>$value->empresa,
                                "finalidade"=>$finalidade,
                                "grupo"=>$value->grupo,
                                "referencia"=>$ref,
                                "referencia_original"=>$value->referencia,
                                "regiao"=>$value->regiao,
                                "tipo"=>$value->tipo]);
               
               
                    $imovelId = $imovelId->id; 
                   
                    if(count($value->variaveis->campo) > 0){
                        foreach ($value->variaveis->campo as $key => $c) {

                            Caracteristica::create(["imovel_id"=>$imovelId,
                            "pref"=>$c->id,
                            "label"=>$c->descricao,
                            "valor"=>$c->valor]);
                            
                         
                            
                            
                        }
                   }
                    if(count($value->fotos->foto) == 0){
                         
                          
                            Fotos::create(["imovel_id"=>$imovelId,
                            "ordem"=>'1',
                            "descricao"=>'default',
                            "alterada"=>'0',
                            "url"=>'/min/img/default.jpg',
                            "arquivo"=>'default.jpg']);
                            
                           

                    }else{
                        
                        foreach ($value->fotos->foto as $key => $f) {
                        
                           
                            Fotos::create(["imovel_id"=>$imovelId,
                            "ordem"=>$f->ordem,
                            "descricao"=>$f->descricao,
                            "alterada"=>$f->alterada,
                            "url"=>$f->url,
                            "arquivo"=>$f->arquivo]);
                        }
                    }

                    if($value->videos->video !== null){
                        foreach (@$value->videos->video as $key => $f) {
                                Videos::create([
                                    'imovel_id'=> $imovelId,
                                    'ordem'=>$f->ordem,
                                    'descricao'=> $f->descricao,
                                    'url'=>$f->url,
                                ]);
                        }
                    }

        $imovel = Imoveis::where('referencia',[$ref])->first();
        if(!$imovel){
           
           

           return response()->json(['status'=>'erro']);
        
        }
       
        return response()->json([
            'status'=>'ok',
        'url'=>route(
            'site.imoveis.detalhes', 
            ['referencia_original'=>$imovel->referencia_original]
            )]);
    }
}
