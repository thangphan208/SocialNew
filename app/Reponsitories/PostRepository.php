<?php

namespace App\Reponsitories;

use App\Reponsitories\PostInterface;
use App\Models;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use App\Models\User;

class PostRepository implements PostInterface
{
    public function all()
    {
        return Post::paginate(4);
    }

    public function get($id)
    {
    }

    public function store(array $data)
    {
    }

    public function update($id, array $array)
    {
    }

    public function delete($id)
    {
    }

    public function getPostByUser($userId)
    {
        $post = new Post();
        $listpost = $post->where('user_id', $userId)->paginate(3);
        return $listpost;
    }

    public function getPostFollowing($userId)
    {
        $user = User::find($userId);
        $data = $user->followees()->get()->pluck('id')->toArray();
        $listpost = Post::whereHas('user', function ($subQ) use ($data) {
            $subQ->whereIn('id', $data);
        })->paginate(4);
        return $listpost;
    }
}
