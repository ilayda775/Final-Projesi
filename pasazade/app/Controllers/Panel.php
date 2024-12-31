<?php

namespace App\Controllers;

use App\Models\PanelModel;

class Panel extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            return view('tema/header') . view('sayfalar/lanasayfa') . view('tema/footer');

        }
        else
        {
            return redirect()->to(base_url('login'));
        }
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

            if (! $this->validate($rules)) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');
            }

            $veri = $this->validator->getValidated();
            $model = model('AnasayfaModel');
            $sor= $model->where(['kulad'=>$veri['kulad'],'sifre'=>$veri['sifre']])->find();
            if(count($sor)>0)
            {
                $kul_bilgi= [
                    'isim'=> 'ilayda',
                    'durum'=> true
                ];
                session()->set($kul_bilgi);

                return redirect()->to(base_url('panel'));

            }
            else
            {
                return view('tema/header', ['UYARI'=> 'HATALI KULLANICI ADI VEYA ŞİFRE']).view('sayfalar/login').view('tema/footer');

            }
            var_dump($sor);

        }

    }

    public function kayit()
    {
        return view('tema/header').view('sayfalar/kayit').view('tema/footer');
    }

    public function hakkimizda()
    {
        return view('tema/header').view('sayfalar/hakkimizda').view('tema/footer');
    }

    public function iletisim()
    {
        return view('tema/header').view('sayfalar/iletisim').view('tema/footer');
    }
}
?>