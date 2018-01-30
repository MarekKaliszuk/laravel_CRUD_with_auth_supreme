<?php

namespace App\Http\Controllers;
use App\Models\Supreme\Cms\Slide;
use App\Models\Supreme\Cms\Settings\MainSetting;

class HomeController extends Controller
{
    public function index()
    {
        $content = '';
        $slides = Slide::all()->where('slider_id','=', 1);
        $recipes = Slide::all()->where('slider_id','=', 2);
        $settings = MainSetting::all();
        $settingsArray = array();

        foreach($settings as $setting){
            $settingsArray[$setting->name] = $setting->value;
        }

        return View('pages.home')->with([
            'content' => $content,
            'slides' => $slides,
            'recipes' => $recipes,
            'settings' => $settingsArray
        ]);
    }
}
