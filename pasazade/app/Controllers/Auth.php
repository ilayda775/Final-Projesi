<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function logout()
    {
        $session = session();
        $session->destroy();


        return redirect()->to(base_url('login'));
    }
}

