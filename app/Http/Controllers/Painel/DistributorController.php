<?php
namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributors;

class DistributorController extends Controller
{
  
    public function list()
    {
       $distributors = Distributors::paginate();

       return view("painel.distributor.list",compact('distributors'));
    }
    public function novo()
    {
       return view("painel.distributor.new");
    }
    public function store(Request $request){
        $data = $request->except('_token');
        Distributors::create($data);
          return response()->json([
          'error'=>'0',
          'msg'=>'Testimonials created with success!, Do you want to create a new?',
        ]);
    }
    public function editar(Request $request, $id)
    {
        $distributor = Distributors::find($id);
        return view("painel.distributor.edit",compact('distributor'));
    }
    public function update(Request $request,$id){
         $data = $request->except('_token');
         $distributor = Distributors::where('id',$id)->update($data);
           return response()->json([
            'error'=>'0',
            'msg'=>'Testimonials updated with success!',
          ]);
    }
    public function delete(Request $request,$id){
        $distributors = Distributors::where('id',$id)->delete();
    }
}
