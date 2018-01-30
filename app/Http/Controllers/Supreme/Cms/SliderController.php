<?php

namespace App\Http\Controllers\Supreme\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supreme\Cms\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;

class SliderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::all();

        return View('mods.cms.slider.list')
            ->with('sliders', $sliders);
    }

    public function create()
    {
        return View('mods.cms.slider.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('mods.cms.slider.create')
                ->withErrors($validator);
        } else {
            $slider = new Slider;
            $slider->name = Input::get('name');
            $slider->description = Input::get('description');
            $slider->save();

            Session::flash('message', 'Utworzono slider!');
            return redirect()->route('Slider.index');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        return View('mods.cms.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required|string'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Slider.edit'.$id)
                ->withErrors($validator);
        } else {
            $slider = Slider::find($id);
            $slider->name = Input::get('name');
            $slider->description = Input::get('description');
            $slider->save();

            Session::flash('message', 'Edycja przebiegła pomyślnie!');
            return redirect()->route('Slider.index');
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        Session::flash('message', 'Slider został usunięty');
        return redirect()->route('Slider.index');
    }
}
