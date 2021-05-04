<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExposeController extends Controller
{
    public function index()
    {
        $listpost = Post::all();
        return view('user.expose', ['users' =>  $listpost]);
    }
}
