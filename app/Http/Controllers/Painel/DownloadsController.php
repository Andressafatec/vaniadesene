<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DownloadsCategories;
use App\Models\Downloads;
use App\Models\DownloadsFiles;
use Illuminate\Support\Str;
use Image;
use File;
use Zip;

class DownloadsController extends Controller
{
    public function index(Request $request){
        $downloads =  Downloads::locale()->where('status','!=','3')->paginate(15);
        return view("painel.downloads.list",compact('downloads'));
    }

    public function new(Request $request){
      $categories = DownloadsCategories::locale()->where('status','1')->get();


      return view("painel.downloads.new",compact('categories'));
  }

  public function edit(Request $request,$id){
    $content = Downloads::find($id);
    $categories = DownloadsCategories::locale()->where('status','1')->get();
    return view("painel.downloads.edit",compact('content','categories'));
}
public function store(Request $request){
    $data = $request->except('_token');
    $data['slug'] = Str::slug($data['title'], '-');

    $contCat = Downloads::locale()->where('title',$data['title'])->count();

    if($contCat > 0){
        $contCat = $contCat + 1;
        $data['slug'] = $data['slug'] . "-". $contCat;
    }

    $data['locale'] = \App::getLocale();

    $download = Downloads::create([
        'locale'=>$data['locale'],
        'title'=>$data['title'],
        'slug'=>$data['slug'],
        'text'=>$data['text'],
        'status'=>$data['status'],
        'id_category'=>$data['parent_id'],
        'media_id'=>$data['media_id'],
    ]);

    if(isset($data['document_id'])){


        foreach($data['document_id'] as $key => $item){
          DownloadsFiles::create([
            'download_id'=> $download->id,
            'file'=>$item,
            'type'=>'document',
        ]);
      }





  }

  if(isset($data['video_galery'])){
      foreach($data['video_galery'] as $key => $item){
          DownloadsFiles::create([
            'download_id'=>$id,
            'file'=>$item,
            'type'=>'video',
        ]);
      }
  }



  return response()->json([
      'error'=>'0',
      'msg'=>'Download created with success!, Do you want to create a new?',
  ]);
}
public function update(Request $request,$id){
    $data = $request->except('_token');
    $data['slug'] = Str::slug($data['title'], '-');

    $contCat = Downloads::locale()->where('title',$data['title'])->where('id','!=',$id)->count();

    if($contCat > 0){
        $contCat = $contCat + 1;
        $data['slug'] = $data['slug'] . "-". $contCat;
    }

    $data['locale'] = \App::getLocale();

    $download = Downloads::where('id',$id)->update([
        'locale'=>$data['locale'],
        'title'=>$data['title'],
        'slug'=>$data['slug'],
        'text'=>$data['text'],
        'status'=>$data['status'],
        'id_category'=>$data['parent_id'],
        'media_id'=>$data['media_id'],
    ]);

    if(isset($data['document_id'])){
        $x = DownloadsFiles::where('download_id',$id)->delete();
        foreach($data['document_id'] as $key => $item){
          DownloadsFiles::create([
            'download_id'=> $id,
            'file'=>$item,
            'type'=>'document',
        ]);
      }

  }

  if(isset($data['videos'])){
    foreach($data['videos'] as $key => $item){
      DownloadsFiles::create([
        'download_id'=>$id,
        'file'=>$item,
        'type'=>'video',
    ]);
  }
}

return response()->json([
  'error'=>'0',
  'msg'=>'Download created with success!, Do you want to create a new?',
]);
}
public function moveFile(Request $request){
    $arrayFile = array();

    $data = $request->all();
    $files = $request->file;

    foreach($files as $file) {
        $e = explode(".",$file->getClientOriginalName());
        $n = str_replace(end($e), "", $file->getClientOriginalName());
        $newName = Str::slug($n,"-") .".".end($e) ;
        $fileName = time(). "_". $newName;
        $arrayFile[] = $fileName;
        $file->move("uploads/downloads/",$fileName);
        
    }
    return response()->json($arrayFile);
}
public function deleteFile(Request $request, $name){

    return unlink("uploads/downloads/".$name);
}
public function removeFile(Request $request, $id){

    $downloadFiles = DownloadsFiles::find($id);

    @unlink("uploads/downloads/".$downloadFiles->file);
    @unlink("uploads/downloads/".$downloadFiles->download->zip_file);
    DownloadsFiles::where('id',$id)->delete();

    return response()->json(['status'=>'1']);

}

public function delete(Request $request, $id){

    $download = Downloads::find($id);

    foreach ($download->documents as $key => $value) {
        @unlink("uploads/downloads/".$value->file);
    }

     @unlink("uploads/downloads/".$download->zip_file);
     DownloadsFiles::where('download_id',$id)->delete();
     Downloads::where('id',$id)->delete();
    }
}
