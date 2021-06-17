<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Reponsitories\PostInterface;

class PostService
{

    private $postRepository;

    public function __construct(PostInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function all()
    {
        return $this->postRepository->all();
    }
}
