<?php

namespace App\Reponsitories;

use App\Models\Admin;
use App\Reponsitories\UserInterface;
use Illuminate\Support\Facades\Auth;

class AdminRepository
{
    public function all()
    {
        return Admin::all();
    }

    public function get($id)
    {
        return Admin::find($id);
    }

    public function store(array $data)
    {
    }

    public function update($id, array $array)
    {
    }

    public function delete($id)
    {
        Admin::delete($id);
    }
}
