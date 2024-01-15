<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $user = new User();
        $users = $user->findAll();
        $this->render('user' , $users);
    }

}