<?php

namespace App\Http\Controllers\Supreme\Cms\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supreme\Cms\Settings\MainSetting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;

class MainController extends Controller
{
    public function index()
    {
        $settings = MainSetting::all();

        return View('mods.cms.settings.main.list')
            ->with('settings', $settings);
    }

    public function create()
    {
        return View('mods.cms.settings.main.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string',
            'value' => 'required|string'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('mods.cms.settings.main.create')
                ->withErrors($validator);
        } else {
            $setting = new MainSetting;
            $setting->name = Input::get('name');
            $setting->value = Input::get('value');
            $setting->save();

            Session::flash('message', 'Utworzono pole konfiguracyjne!');
            return redirect()->route('main.index');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $setting = MainSetting::find($id);

        return View('mods.cms.settings.main.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required|string',
            'value' => 'required|string'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('main.create')
                ->withErrors($validator);
        } else {
            $setting = MainSetting::find($id);
            $setting->name = Input::get('name');
            $setting->value = Input::get('value');
            $setting->save();

            Session::flash('message', 'Edycja przebiegła pomyślnie!');
            return redirect()->route('main.index');
        }
    }

    public function destroy($id)
    {
        $setting = MainSetting::find($id);
        $setting->delete();

        Session::flash('message', 'Pole konfiguracyjne zostało usunięte');
        return redirect()->route('main.index');
    }
}
