<?php

namespace App\Reponsitories;

use App\Models\User;
use App\Reponsitories\UserInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{
    public function all()
    {
        $user = new User();
        $data = $user::all();
        return $data;
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        return User::find($id)->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function getFollowerByID($id)
    {
        $user = User::find($id);
        return $user->followers()->get()->pluck('id')->toArray();
    }

    public function getFolloweesByID($id)
    {
        $user = User::find($id);
        return $user->followees()->get()->pluck('id')->toArray();
    }

    public function insertFollower($followerId)
    {
        User::find(Auth::user()->id)->followers()->attach($followerId);
    }

    public function deleteFollower($followerId)
    {
        User::find(Auth::user()->id)->followers()->detach($followerId);
    }
}
