<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Reponsitories\PostInterface;
use App\Reponsitories\UserInterface;
use App\Reponsitories\User_FollowingRepositoryInterface;

class UserController extends Controller
{
    private $postRepository;
    private $userRepository;

    public function __construct(
        PostInterface $postRepository,
        UserInterface $userRepository
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //get user logged
        $userAuth = Auth::user();
        //get user by id get from url
        $user = User::find($id);
        //get numFollow of user and list post
        $followersByUser = $this->userRepository->getFollowerByID($id);
        $followeesByUser = $this->userRepository->getFolloweesByID($id);
        // $check = array_search($idAuth,$followersByUser);
        $check = true;
        if ($userAuth->id != $id) {
            $check = in_array(Auth::user()->id, $followeesByUser);
        }
        //count number of follower and folloees;
        $numFollowers = count($followersByUser);
        $numFollowees = count($followeesByUser);
        $posts = $this->postRepository->getPostByUser($user->id);
        return view('user.userdetail', compact(
            'user',
            'posts',
            'numFollowers',
            'numFollowees',
            'userAuth',
            'check'
        ));
    }

    /**
     * Update following by user id
     */

    public function updateFollower($id)
    {
        $this->userRepository->insertFollower($id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->deleteFollower($id);
        return back();
    }
}
