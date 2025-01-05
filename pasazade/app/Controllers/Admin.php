<?php

namespace App\Controllers;

use App\Models\PanelModel;

class Admin extends BaseController
{
    private $panelModel;

    public function __construct()
    {
        $this->panelModel = new PanelModel();
    }


    public function iletisimForm()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'ad_soyad' => 'required|min_length[3]|max_length[50]',
            'e_mail' => 'required|valid_email',
            'konu' => 'required|min_length[3]|max_length[100]',
            'telefon' => 'required|numeric',
            'mesaj' => 'required|min_length[10]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $data = [
            'ad_soyad' => $this->request->getPost('ad_soyad'),
            'e_mail' => $this->request->getPost('e_mail'),
            'konu' => $this->request->getPost('konu'),
            'telefon' => $this->request->getPost('telefon'),
            'mesaj' => $this->request->getPost('mesaj'),
            'cevap' => null // Başlangıçta cevap yok
        ];


        $this->panelModel->saveMessage($data);

        return redirect()->to('/iletisim')->with('success', 'Mesajınız başarıyla gönderildi.');
    }



    public function iletiler()
    {
        // Modelden tüm iletileri al
        $data['iletisimler'] = $this->panelModel->getAllMessages();


        return view('sayfalar/iletisim_liste', $data);
    }

    public function cevapla($id)
    {
        if ($this->request->getMethod() == 'post') {
            $cevap = $this->request->getPost('cevap');

            $objectId = new \MongoDB\BSON\ObjectId($id);


            $this->panelModel->updateMessage($objectId, $cevap);


            return redirect()->to('/admin/iletiler')->with('success', 'Cevap başarıyla kaydedildi.');
        }
    }


}