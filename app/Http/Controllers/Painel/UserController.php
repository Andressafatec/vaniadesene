<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Criteria\StatusCriteria;
use App\Models\User;
use App\Models\Configuracoes;
use DB;
use Mail;
class UserController extends Controller
{
    
    public function index()
    {
       
        $users = User::orderBy('name','asc')->get();
        return view('painel.users.list',compact('users'));
    }
  
    public function create()
    {
         return view('painel.users.create');
    }
   
    public function store(Request $request){
        $data = $request->all();
        $data['senha'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $lastInsertedId = User::create($data)->id;
        // $email =  Configuracoes::where(['parametro'=>'email'])->first()->value;
        // if(!$email){
        //     $email = "no-repley@us-atlasfiltri.com";
        // }
        // $data['sendMail'] = strtolower($email);
        // $data['link'] = route('admin.index');
        // $enviado = \Mail::send('emails.user-new', $data, function($message) use ($data) {
        //     $message->from($data['sendMail'], 'Atlas Filter');
        //     $message->to($data['email'], $data['name'])->subject('New Usuário ');
        // });

         $idUser = DB::getPdo()->lastInsertId();
        
        return response()->json([
           'erro' => 0,
           'msg' => 'Saved successfully',
           'url' => route('admin.users.edit', ['id' => $idUser])
         ]);
    }
   
    public function edit($id)
    {
         $usuario = User::find($id);
         return view('painel.users.edit',compact('usuario'));
        
    }
  
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        if(!empty($data['password'])){
           $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        $usuario = User::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
       return response()->json([
            'erro' => 0,
            'msg' => 'Updated successfully',
        ]);
    }
   
    public function delete($id)
    {
       User::where('id',$id)->delete();
    }
}
