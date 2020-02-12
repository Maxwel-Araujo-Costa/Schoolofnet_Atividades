<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->deny('edit');
        $this->Auth->allow('add');
    }

    //public function initialize()
    //{
    //     parent::initialize();

    //    $this->loadComponent('Auth');
    //$this->Auth->allow(['view', 'index', 'add', 'edit', 'delete', 'logout']);
    // }
    // public function login()
    //{
    //     if ($this->request->is('post')) {
    //debug($this->request->data);
    //         $user = $this->Auth->identify();
    //        if ($user) {
    //            $this->Auth->setUser($user);
    //           return $this->redirect($this->Auth->redirectUrl());
    //         }
    //     }
    // }

    // public function display($name)
    //{
    //     echo $name;
    //      exit;
    //  }



    public function login()
    {
        if ($this->request->is('post')) {

            $usuario = $this->request->getData('email');
            $senha = $this->request->getData('password');
            $user = $this->Users->find('all', [
                'conditions' => ['Users.email' => $usuario],
            ])->first();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect('/users');
            }
            return $this->redirect('/users/login');
        }
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['action' => 'login']);
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
                $this->Flash->success("salvo com sucesso!");
                $this->redirect(['controller' => 'users', 'action' => 'index']);
            } else {
                $this->Flash->error("Nao pode ser removido.");
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
                $this->Flash->success("salvo com sucesso!");
            } else {
                $this->Flash->error("Nao pode ser removido.");
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
            $this->Flash->success("Removido com sucesso!");
        } else {
            $this->Flash->error("Nao pode ser removido.");
        }
        $this->redirect(['controller' => 'users', 'action' => 'index']);
    }
}
