<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExposeController extends Controller
{
    public function index()
    {
        $listpost = DB::select('SELECT * FROM post');
        return view('user.expose', ['users' =>  $listpost]);
    }
}
