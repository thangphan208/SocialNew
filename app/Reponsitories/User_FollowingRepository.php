<?php

namespace App\Reponsitories;
use App\Models\User_Following;
use App\Reponsitories\User_FollowingRepositoryInterface;

class User_FollowingRepository implements User_FollowingRepositoryInterface
{
    public function all()
    {
        $user_Following = new User_Following();
        $data = $user_Following->all();
        return $data;
    }

    public function create(array $data)
    {
        return User_Following::create($data);
    }
}
