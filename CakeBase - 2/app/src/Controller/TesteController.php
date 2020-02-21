<?php

namespace App\Controller;

class TesteController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }
}
