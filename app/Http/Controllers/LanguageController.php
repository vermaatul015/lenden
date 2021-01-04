<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang(Request $request)
    {
        $lang = $request->input('lang');
        if (array_key_exists($lang, Config::get('common_constant.lang'))) {
            // App::setLocale($lang);
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
}
