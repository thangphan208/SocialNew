<?php

namespace App\Reponsitories;

interface PostInterface
{
    public function all();

    public function get($id);

    public function store(array $data);

    public function update($id, array $array);

    public function delete($id);

    public function get_post_Following($id);
    public function get_post_user($user_id);
}
