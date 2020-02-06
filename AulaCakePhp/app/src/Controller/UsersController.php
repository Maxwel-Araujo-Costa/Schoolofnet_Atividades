<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function index()
    {
        $users = $this->paginate($this->Users);
        //$this->set(['users'=>$usersList]);
        $this->set(compact('users'));
    }
    public function add()
    {
    }
    public function edit($id)
    {
    }
    public function view($id)
    {
    }
    public function delete($id)
    {
    }
}
