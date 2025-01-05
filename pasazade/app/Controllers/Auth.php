<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function logout()
    {
        $session = session(); // Oturumu başlat
        $session->destroy();  // Oturumu sonlandır

        // Giriş sayfasına yönlendir
        return redirect()->to(base_url('login'));
    }
}

