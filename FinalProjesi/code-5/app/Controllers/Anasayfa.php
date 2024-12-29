<?php

namespace App\Controllers;

class Anasayfa extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('tema/header').view('sayfalar/anasayfa').view('tema/footer');
    }
    public function login()
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            return redirect()->to(base_url('panel'));
        }
        else
        {
            if (! $this->request->is('post')) {
            return view('tema/header').view('sayfalar/login').view('tema/footer');
        }

            $rules = [
                'kulad' => 'required',
                'sifre' => 'required'
            ];

            $data = $this->request->getPost(array_keys($rules));

            if (! $this->validateData($data, $rules)) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');
            }

            $veri = $this->validator->getValidated();

        }
    }
    public function kayit()
    {

    }
}
