<?php
namespace App\Reponsitories;

interface UserInterface{


    public function all();

    public function get($id);

    public function store(array $data);

    public function update($id, array $array);

    public function delete($id);




}
