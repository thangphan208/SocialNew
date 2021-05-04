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

    public function get_post_user($user_id){
        $post = new Post();
        $listpost = $post->where('user_id', $user_id)->paginate(3);
        return $listpost;
    }

    public function get_post_Following($id)
    {
        // $post = new Post();
        // $data = $post::select('SELECT * FROM user_following uf INNER JOIN post p
        //  ON uf.user_id_following = p.user_id WHERE uf.user_id=?', [$id]);

        // $arrayFollowingIds = $auth->followings()->select('id')->get()->pluck('id')->toArray();


        // $query = Post::whereHas('user', function($subQ) use ($arrayFollowingIds) {
        //     $subQ->whereIn('id', $arrayFollowingIds);
        // });

        // return $data;
    }
}
