<?php

namespace App\Controller\Api\V1;

use App\Controller\AppController;
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login']);
    }
    public function login()
    {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            $data = [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 3600 * 24
                ], Security::salt())
            ];
            $this->set([
                'data' => $data,
                '_serialize' => ['data']
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'data' => 'Usuário ou senha inválidos!',
                '_serialize' => ['data']
            ]);
        }
    }
    public function index()
    {
        $users = $this->Users->find('all');
        $this->set([
            'data' => $users,
            '_serialize' => ['data']
        ]);
    }
}
