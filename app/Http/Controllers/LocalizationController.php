<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function changeLanguage($language){
        session(['selected_language' => $language]);
        return back();
    }
}
