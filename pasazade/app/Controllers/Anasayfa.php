<?php

namespace App\Controllers;

use App\Models\AnasayfaModel;

class Anasayfa extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('tema/header') . view('sayfalar/anasayfa') . view('tema/footer');
    }

    public function login()
    {
        $session= session();

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

            if (! $this->validate($rules)) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');
            }

           $veri = $this->validator->getValidated();
            $model = model('AnasayfaModel');
            $sor= $model->where(['kulad'=>$veri['kulad'],'sifre'=>$veri['sifre']])->find();
            if (count($sor) > 0) {
                $kul_bilgi = [
                    'kulad' => $veri['kulad'], // Oturuma kullanıcı adı kaydediliyor
                    'durum' => true
                ];
                session()->set($kul_bilgi);

                return redirect()->to(base_url('panel'));
            } else {
                return view('tema/header', ['UYARI' => 'HATALI KULLANICI ADI VEYA ŞİFRE'])
                    . view('sayfalar/login')
                    . view('tema/footer');
            }

        }

    }

    public function hakkimizda()
    {
        return view('tema/header').view('sayfalar/hakkimizda').view('tema/footer');
    }

    public function hizmetler()
    {
        return view('tema/header').view('sayfalar/hizmetler').view('tema/footer');
    }

    public function projeler()
    {
        return view('tema/header').view('sayfalar/projeler').view('tema/footer');
    }

    public function haberler()
    {
        return view('tema/header').view('sayfalar/haberler').view('tema/footer');
    }

    public function iletisim()
    {
        return view('tema/header').view('sayfalar/iletisim').view('tema/footer');
    }

    public function adfooter()
    {
        return view('admin/iletisim');
    }

    public function panel()
    {
        return view('tema/header').view('sayfalar/panel').view('tema/footer');
    }

    public function iletisim_liste()
    {
        return view('tema/header').view('sayfalar/iletisim_liste').view('tema/footer');
    }

}
?>