<?php

namespace App\Reponsitories;

use App\Models\User;
use App\Reponsitories\UserInterface;


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
}
