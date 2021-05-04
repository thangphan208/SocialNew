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

class UserDetailController extends Controller
{


    private $postRepository;
    private $userRepository;
    private $user_FollowingRepository;


    public function __construct(
        PostInterface $postRepository,
        UserInterface $userRepository,
        User_FollowingRepositoryInterface $user_FollowingRepository
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
        $this->user_FollowingRepository = $user_FollowingRepository;
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $id = $user->id;

        $user = User::find($id);
        $datafollowers = $user->followers()->get()->pluck('id')->toArray();
        $datafollowees = $user->followees()->get()->pluck('id')->toArray();
        $numFollowers = count($datafollowers);
        $numFollowees = count($datafollowees);
        $post = new Post();
        $listpost = $this->postRepository->get_post_user($user->id);
        $check = false;
        return view('user.userdetail', compact(
            'user',
            'listpost',
            'numFollowers',
            'numFollowees',
            'check'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $idAuth = $userAuth->id;
        $userAuth = User::find($id);

        //get user by id get from url
        $user  = new User();
        $user = User::find($id);

        //get numFollow of user and list post

        $datafollowers = $user->followers()->get()->pluck('id')->toArray();
        $datafollowees = $user->followees()->get()->pluck('id')->toArray();

        // $check = array_search($idAuth,$datafollowers);
        $check = in_array($idAuth, $datafollowers);

        $numFollowers = count($datafollowers);
        $numFollowees = count($datafollowees);
        $post = new Post();
        $listpost = $this->postRepository->get_post_user($user->id);
        return view('user.userdetail', compact(
            'user',
            'listpost',
            'numFollowers',
            'numFollowees',
            'userAuth',
            'check'
        ));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update_follow($id)
    {
        $userAuth = Auth::user();
        $idAuth = $userAuth->id;

        $data = [
            'follower_id' =>  (int)$idAuth,
            'followee_id' => (int)$id
        ];

        $this->user_FollowingRepository->create($data);
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
        //
    }
}
