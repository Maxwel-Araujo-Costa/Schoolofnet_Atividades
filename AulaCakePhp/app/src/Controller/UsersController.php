<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Auth');
        $this->Auth->allow(['view', 'index', 'add']);
    }
    public function index()
    {
        $users = $this->paginate($this->Users);
        //$this->set(['users'=>$usersList]);
        $this->set(compact('users'));
    }
    public function add()
    {
        if ($this->request->is('post')) {
            var_dump($this->request->data);
        }
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
