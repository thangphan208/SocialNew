<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Reponsitories\UserInterface;

class UserService
{

    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function all()
    {
        return $this->userRepository->all();
    }
}
