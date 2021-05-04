<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Reponsitories\PostInterface;
use App\Reponsitories\UserInterface;
use App\Models\User;
use App\Models\Post;
class FollowingController extends Controller
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
        $posts = $this->postRepository->getPostFollowing($user->id);
        $user_get = $this->userRepository->get($user->id);
        return view('user.following', compact('user_get', 'posts'));
    }
}
