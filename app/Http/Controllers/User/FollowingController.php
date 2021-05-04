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
        $id = $user->id;

        $user = User::find($id);
        $data = $user->followers()->get()->pluck('id')->toArray();
        $listpost = Post::whereHas('user', function($subQ) use ($data) {
            $subQ->whereIn('id', $data);
        })->paginate(4);

        $user_get = $this->userRepository->get($id);
        return view('user.following', compact('user_get', 'listpost'));
    }
}
