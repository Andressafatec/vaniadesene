<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Banners;
use App\Models\Products;
use App\Http\Controllers\Controller;
use App\Criteria\StatusCriteria;
use Illuminate\Support\Facades\Input as Input;
use DB;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $banners = Banners::locale()->where('status', 'ativo')->get();
        return view("painel.banners.list", compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
       return view("painel.banners.novo");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $locale = \app()->getLocale();
        Banners::create([
            'nome' => $data['nome'],
            'locale' => $locale,
            'media_id' => $data['media_id'],
            'media_mobile_id' => $data['media_mobile_id'],
            'link' => $data['link']
        ]);
        $banner =  DB::getPdo()->lastInsertId();
        return response()->json(['erro'=>0,'msg'=>'Banner Cadastrado cum sucesso!']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
         $banner = Banners::find($id);
         return view("painel.banners.editar",compact('banner'));
    }
/**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
   
        Banners::where('id', $id)->update($data);
        return response()->json([
            'erro' => 0,
            'msg' => 'Atualização realizada com sucesso',
        ]);
    }

    public function order(Request $request){
        $data = $request->except('_token');
      
        foreach($data['order'] as $key => $val){
            if($val == ""){
                $val = $key;
            }
            Banners::where('id', $key)->update(['ordem'=>$val]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banners::where('id', $id)->delete();
    }
    public function moveImg(Request $request){
        $arrayFile = array();
        $files = Input::file('file');
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('./img/banners/',$fileName);
            $arrayFile['infor'] = list($width, $height, $type, $attr) = getimagesize('./img/banners/'.$fileName);
        }
        return response()->json($arrayFile);
    }
    public function deleteImg(Request $request){
        $data = $request->all();
        $del = unlink("./img/banners/".$data['arquivo']);
        if($del){
             Banners::update(['arquivo'=>''],$data['banner']);
            echo 1;
        }
    }
}
