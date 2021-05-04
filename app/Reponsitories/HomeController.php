<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Reponsitories\PostRepository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        dd(1);
        $this->postRepository= $postRepository;
    }

    public function index()
    {
        $user = Auth::user();
        $listpost = $this->postRepository->all();
        return view('user.home', compact('user', 'listpost'));
    }




}
