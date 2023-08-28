<?php
namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
use Illuminate\Support\Str;
class TestimonialsController extends Controller
{
    public function list()
    {
        $testimonials =  Testimonials::locale()->where('status','!=','3')->paginate(15);
        return view("painel.testimonials.list",compact('testimonials'));
    }
    public function novo()
    {
       return view("painel.testimonials.novo");
    }
    public function store(Request $request){
    $data = $request->except('_token');
    $data['locale'] = \App::getLocale();
    $Testimonials = Testimonials::create($data);
    return response()->json([
          'error'=>'0',
          'msg'=>'Testimonials created with success!, Do you want to create a new?',
        ]);
    }
    public function editar(Request $request,$id)
    {
        $testimonial = Testimonials::find($id);
        return view("painel.testimonials.editar",compact('testimonial'));
    }
    public function update(Request $request,$id)
    {
        $data = $request->except('_token');
        $testimonial = Testimonials::where('id',$id)->update($data);
        return response()->json([
            'error'=>'0',
            'msg'=>'Testimonials updated with success!',
          ]);
    }
    public function delete(Request $request,$id){
        $testimonial = Testimonials::where('id',$id)->delete();
    }
}
