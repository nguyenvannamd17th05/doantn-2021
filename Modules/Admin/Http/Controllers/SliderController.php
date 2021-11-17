<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Slider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::slider.index');
    }

    public function create()
    {
        return view('admin::slider.create');
    }
    public function store(Request $request){

        $this->insertOrUpdate($request);
        return redirect(route('admin.slider.index'));
    }
    public function edit($id){
        $slider=Slider::find($id);
        return view('admin::slider.update',compact('slider'));
    }
    public function update(Request $request,$id){
        $this->insertOrUpdate($request,$id);
        return redirect(route('admin.slider.index'));
    }
    public function insertOrUpdate($request,$id=''){
        $code=1;
        try{
            $slider=new Slider();

            if($id){
                $slider=Slider::find($id);
            }
            $slider->s_name=$request->s_name;
            $slider->s_slug=Str::slug($request->s_name);
            $slider->s_desc=$request->s_desc;
            $slider->save();
        }catch (\Exception $exception){
            $code=0;
            Log::error("[Error insertOrUpdate Sliders]".$exception->getMessage());

        }
        return $code;
    }
    public function action($action,$id){
        if($action){
            $slider=Slider::find($id);
            switch ($action)
            {
                case 'delete':
                    $slider->delete();
                    break;
                case 'active':
                    $slider->s_active=!($slider->s_active) ;
                    $slider->save();
                    break;
            }
        }
        return redirect()->back();
    }

}
