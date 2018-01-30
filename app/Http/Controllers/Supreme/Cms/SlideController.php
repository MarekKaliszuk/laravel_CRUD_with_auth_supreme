<?php

namespace App\Http\Controllers\Supreme\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Supreme\Cms\Slide;
use Session;

class SlideController extends Controller
{
    public function index()
    {

    }

    public function create($id)
    {
        return View('mods.cms.slide.create', compact('id'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'slider_id' => 'required|integer',
            'slide_image_small' => 'image|mimes:jpeg,png,jpg,|max:200',
            'slide_image' => 'required|image|mimes:jpeg,png,jpg,|max:400',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Slide.create', Input::get('slider_id'))
                ->withErrors($validator);
        } else {
            if ($request->hasFile('slide_image')) {

                $slide = new Slide;
                $slide->slider_id = Input::get('slider_id');

                if ($request->hasFile('slide_image_small')) {
                    #small image
                    $image = $request->file('slide_image_small');
                    $currentName = $image->getClientOriginalName();
                    $name = time() . '_small_' . $currentName;
                    $destinationPath = public_path('/assets/images/slides/small');
                    $image->move($destinationPath, $name);
                } else {
                    $name = null;
                }

                $slide->slide_image_small = $name;

                #big image
                $image = $request->file('slide_image');
                $currentName = $image->getClientOriginalName();
                $name = time() . '_' . $currentName;
                $destinationPath = public_path('/assets/images/slides/big');
                $image->move($destinationPath, $name);

                $slide->slide_image = $name;
                $slide->save();
            }

            Session::flash('message', 'Utworzono slide!');
            return redirect()->route('Slide.show', $slide->slider_id);
        }
    }

    public function show($id)
    {
        $slides = Slide::all()->where('slider_id', '=', $id);
        return View('mods.cms.slide.list', compact('slides', 'id'));
    }

    public function edit($id)
    {
        $slide = Slide::find($id);

        return View('mods.cms.slide.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'slider_id' => 'required|integer',
            'slide_image_small' => 'image|mimes:jpeg,png,jpg,|max:200',
            'slide_image' => 'required|image|mimes:jpeg,png,jpg,|max:300',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Slide.edit', $id)
                ->withErrors($validator);
        } else {

            $slide = Slide::find($id);

            if ($request->hasFile('slide_image_small')) {
                #small image
                $image = $request->file('slide_image_small');
                $currentName = $image->getClientOriginalName();
                $name = time() . '_small_' . $currentName;
                $destinationPath = public_path('/assets/images/slides/small');
                $image->move($destinationPath, $name);
            } else {
                $name = null;
            }

            $slide->slide_image_small = $name;

            #big image
            $image = $request->file('slide_image');
            $currentName = $image->getClientOriginalName();
            $name = time() . '_' . $currentName;
            $destinationPath = public_path('/assets/images/slides/big');
            $image->move($destinationPath, $name);

            File::delete('assets/images/slides/' . $slide->slide_image);

            $slide->slide_image = $name;
            $slide->save();


            Session::flash('message', 'Utworzono slide!');
            return redirect()->route('Slide.show', $slide->slider_id);
        }
    }

    public function destroy($id)
    {
        $slide = Slide::find($id);
        File::delete('assets/images/slides/' . $slide->slide_image);
        $slide->delete();

        Session::flash('message', 'Slide został usunięty');
        return redirect()->back();
    }
}
