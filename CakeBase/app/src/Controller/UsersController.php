<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Auth');
        $this->Auth->allow(['view', 'index', 'add', 'edit', 'delete']);
    }
    public function index()
    {
        $users = $this->paginate($this->Users);
        //$this->set(['users'=>$usersList]);
        $this->set(compact('users'));
    }
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //$user->name = $this->request->data['name'];
            $user = $this->Users->patchEntity($user, $this->request->data);
            //var_dump($user);
            //var_dump($this->request->data);
            if ($this->Users->save($user)) {
                echo "salvo com sucesso!";
            } else {
                echo "Nao pode ser salvo.";
            }
        }
        $this->set(compact('user'));
    }
    public function edit($id)
    {

        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            //$user->name = $this->request->data['name'];
            $user = $this->Users->patchEntity($user, $this->request->data);
            //var_dump($user);
            //var_dump($this->request->data);
            if ($this->Users->save($user)) {
                echo "salvo com sucesso!";
            } else {
                echo "Nao pode ser salvo.";
            }
        }
        $this->set(compact('user'));
    }
    public function view($id)
    {
        $user = $this->Users->get($id);
        //$this->set(['user'->$user]);
        $this->set(compact('user'));
    }
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            echo "removido com sucesso!";
        } else {
            echo "Nao pode ser removido.";
        }
        exit;
    }
}
