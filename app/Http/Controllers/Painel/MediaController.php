<?php
namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Http\Requests;
use URL;
use Illuminate\Support\Str;
use Image;
use File;
class MediaController extends Controller
{
	
	    public function index(Request $request,$folder = null){
	    	
	    	/*$absoluteFolderPath = $_SERVER['DOCUMENT_ROOT'] . '/img/parceiros/';
	   	 	$fnames = scandir($absoluteFolderPath);
	   	 	$arrayDir = [];
	   	 	$arrayFile = [];
	   	 	foreach ($fnames as $key => $value) {
	   	 		if(is_dir($absoluteFolderPath . $value)){
					if($value != '.' or $value != '..'){
						$arrayDir[] = $value;
					}
	   	 		}
	   	 		if(!is_dir($absoluteFolderPath . $value)){
	   	 			$ext = explode('.', $value);
	   	 			$ext = end($ext);
	   	 			$media = Media::create(['file'=>$value,'type'=>$ext,'folder_parent'=>'img/','folder'=>'parceiros/']);
	   	 		}
	   	 	}
	*/
	   	 	$folders = [];
			if(!$folder){
				$folder = "uploads";
			}
			//$folderAtual = $folder;
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(999999999);
			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			/*$foldersAll = Media::select('folder')->where('folder','!=',$folderAtual)->groupBy('folder')->get();
			foreach ($foldersAll as $key => $value) {
				
					$folders[] = $value->folder;
				
			}
			*/
			$foldersScan = scandir('uploads');
			foreach ($foldersScan as $key => $value) {
					if(is_dir('uploads/'. $value) && $value != "." && $value != ".."){
						$folders[] = $value;
					}
			}
   	 	return view("painel.media.index",compact('files','folders','folderAtual','folder_parent'));
    }
    public function listFiles(Request $request){
    	$data = $request->all();
    	$folderAtual = $data['folder'];
    	//dd($folderAtual);
    		$arquivos = scandir('uploads/'.$folderAtual);
			foreach ($arquivos as $key => $value) {
					if(!is_dir('uploads/'.$folderAtual ."/". $value) && $value != "." && $value != ".." ){
						$ext = explode('.',$value);
						Media::firstOrCreate(['file' =>  $value,'folder'=>$folderAtual."/",'type'=>end($ext)]);

						
					}
			}
   		$files = Media::where(['folder'=>$folderAtual.'/'])->orderBy('id','desc')->paginate(9999999);
			foreach ($files as $key => $file) {
				
					if(!file_exists("uploads/".$file->folder_parent.$file->folder.$file->file)){
						Media::where(['id'=>$file->id])->delete();
						unset($files[$key]);
					}
					$arquivo = "uploads/".$file->folder_parent.$file->folder.$file->file;
					$arquivo = str_replace('//','/',$arquivo);
					if(in_array(strtolower($file->type),['jpg','png','gif','tif','svg','jpeg'])){
						
						$img = @Image::make($arquivo);
						if($img){
						Image::configure(array('driver' => 'imagick'));
			            $width = Image::make($arquivo)->width();
						if($width > 1250){
				            $image = Image::make($arquivo)->resize(1250, null,function ($constraint) {
				                $constraint->aspectRatio();
				            });
			           		$image->save($arquivo,85);
			             }
						}else{
							dump($arquivo);
						}
						}
			}


			
		return view("painel.media._list-files",compact('files','folderAtual'));
    }
    public function newFolder(Request $request){
    	$data = $request->all();
    	if($data['folder_pai'] != "uploads/"){
    		$path = "./uploads/".$data['folder_pai'].Str::slug($data['name_folder']);
    		mkdir($path,0755,true);

    	}else{
    		$path = "./".$data['folder_pai'].Str::slug($data['name_folder']);
		
    		mkdir($path,0755,true);
    	}

    		$folders = [];
			$folder = "uploads";
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			
			$foldersScan = scandir('uploads');
			foreach ($foldersScan as $key => $value) {
					if(is_dir('uploads/'. $value) && $value != "." && $value != ".."){
						$folders[] = $value;
					}
			}
   	 	return view("painel.media._pastas",compact('folders','folderAtual'));

    }
     public function moveFile(Request $request){
        $arrayFile = array();
       
        $data = $request->all();
        $files = $request->file;
      	$folder = $data['folder'];
      	$folder_parent = $data['folder_parent'];
		$imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n,"-") .".".end($e) ;
			$extension = strtolower(end($e));
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move("uploads/".$folder,$fileName);

			if(in_array($extension, $imageExtensions))
			{
            if(@is_array(getimagesize("uploads/".$folder."/".$fileName))){
	            Image::configure(array('driver' => 'imagick'));
	            $width = Image::make("uploads/".$folder."/".$fileName)->width();
				if($width > 1250){
		            $image = Image::make("uploads/".$folder."/".$fileName)->resize(1250, null,function ($constraint) {
		                $constraint->aspectRatio();
		            });
	           		$image->save("uploads/".$folder."/".$fileName,85);
	             }
	            $media = Media::create(['file'=>$fileName,'type'=>end($e),'folder_parent'=>$folder_parent,'folder'=>$folder]);
        	}
			}
        }
        return response()->json($arrayFile);
    }
    public function moveFileCk(Request $request){
			$file = $request->upload;
			$folder_parent = null;
			$folder = 'conteudo';
			$imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n,"-") .".".end($e) ;
			$extension = end($e);
            $fileName = time(). "-". $newName;
           
            $file->move("uploads/".$folder,$fileName);

			if(in_array($extension, $imageExtensions))
			{
            if(@is_array(getimagesize("uploads/".$folder."/".$fileName))){
	            Image::configure(array('driver' => 'imagick'));
	            $width = Image::make("uploads/".$folder."/".$fileName)->width();
				if($width > 1500){

		            $image = Image::make("uploads/".$folder."/".$fileName)->resize(1000, null,function ($constraint) {
		                $constraint->aspectRatio();
		            });

	           		$image->save("uploads/".$folder."/".$fileName,100);
	             }
	            $media = Media::create(['file'=>$fileName,'type'=>end($e),'folder_parent'=>$folder_parent,'folder'=>$folder]);
        	}
			}
		
		 return response()->json([
			"uploaded"=> 1,
		"fileName"=> $fileName,
		"url"=> asset('uploads/'.$folder.'/'.$fileName),
		]);
	}
    public function deleteFile(Request $request){
        $data = $request->all();
       foreach ($data['file'] as $key => $value) {
      	$file = Media::where(['id'=>$value])->first();
        Media::where(['id'=>$value])->delete();
        $del = unlink("uploads/".$file->folder_parent . $file->folder .$file->file);
        if($del){
            return response()->json(['status'=>'deletado']);
        }
            }
    }
    public function getFile(Request $request,$id){
      
     
        $file = Media::find($id);
        $file->fullpatch = URL::to('/')."/uploads/".$file->folder_parent.$file->folder.$file->file;
       
        return response()->json($file);
       
    }
	    public function popUp(Request $request,$folder = null){
	   	 	//$folders = [];
			if(!$folder){
				$folder = "uploads";
			}
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(9999999);
			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			$foldersAll = Media::select('folder')->where('folder','!=',$folderAtual)->groupBy('folder')->get();
			foreach ($foldersAll as $key => $value) {
				
					$folders[] = $value->folder;
				
			}
			$folders = scandir('uploads');
			foreach ($folders as $key => $value) {
					if($value == "." || $value == ".."){
						unset($folders[$key]);
					}
			}
   	 		return view("painel.media.include_media",compact('files','folders','folderAtual','folder_parent'));
    	}
		
}
