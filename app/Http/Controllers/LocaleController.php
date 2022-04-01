<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($locale='en')
    {
        if (!in_array($locale, ['en', 'ar'])){
            $locale = 'en';
        }
        App::setLocale($locale);
        session()->put('locale', $locale);
        return back();
    }
}
