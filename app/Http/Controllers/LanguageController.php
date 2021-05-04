<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index($language)
    {
        if ($language) {
            Session::put('language', $language);
        }
        return back();
    }
}
