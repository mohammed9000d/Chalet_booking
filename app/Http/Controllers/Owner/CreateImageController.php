<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Chalet;
use App\Models\Slider;
use Illuminate\Http\Request;

class CreateImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::all();
        return view('owner.images.index',['sliders'=>$sliders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chalets = Chalet::where('owner_id', '=', Auth()->user()->id)->get();
        return view('owner.images.create',['chalets' => $chalets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'chalet_id'=>'required|integer|exists:chalets,id',
            'image' => 'required|image',
        ]);

        $slider = new Slider();
        $slider->chalet_id = $request->get('chalet_id');

        if ($request->hasFile('image')) {
            $sliderImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $sliderImage->getClientOriginalExtension();
            $sliderImage->move('images/slider', $name);
            $slider->image = $name;
        }

        $isSave = $slider->save();
        if($isSave){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Image created successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create image');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Slider::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Image deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete image',
                'icon'=>'error'
            ]);

        }
    }
}
