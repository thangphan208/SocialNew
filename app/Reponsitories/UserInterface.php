<?php

namespace App\Reponsitories;

use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

interface UserInterface
{


    public function all();

    public function get($id);

    public function store(array $data);

    public function update($id, array $array);

    public function delete($id);

    public function getFolloweesByID($id);

    public function getFollowerByID($id);

    public function insertFollower($followerId, $userIdLogged);

    public function deleteFollower($followerId, $userIdLogged);
}
