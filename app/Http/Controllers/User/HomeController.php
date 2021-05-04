<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Reponsitories\PostInterface;
use App\Reponsitories\UserInterface;
use App\Models\User;
use App\Models\Post;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    private $postRepository;
    private $userRepository;

    public function __construct(
        PostInterface $postRepository,
        UserInterface $userRepository
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = Auth::user();
        $id = $user->id;

        $user_get = $this->userRepository->get($id);
        $user_list = $this->userRepository->all();
        $listpost = $this->postRepository->all();
        return view('user.home', compact('user_get', 'listpost','user_list'));
    }
}
