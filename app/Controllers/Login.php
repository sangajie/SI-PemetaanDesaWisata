<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        // $data['title']= 'Dashboard';
        $data['title']= 'Login';
        return view('__layout/login', $data);
    }
}
