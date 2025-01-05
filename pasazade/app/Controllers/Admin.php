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

    // İletişim formu verisini kaydetme
    public function iletisimForm()
    {
        if ($this->request->getMethod() == 'post') {
            // Formdan gelen veriyi al
            $data = [
                'ad_soyad' => $this->request->getPost('ad_soyad'),
                'e_mail' => $this->request->getPost('e_mail'),
                'konu' => $this->request->getPost('konu'),
                'telefon' => $this->request->getPost('telefon'),
                'mesaj' => $this->request->getPost('mesaj'),
                'cevap' => null // Başlangıçta cevap yok
            ];

            // Veriyi kaydet
            $this->panelModel->saveMessage($data);

            // Başarı mesajı ve yönlendirme
            return redirect()->to('/iletisim')->with('success', 'Mesajınız başarıyla gönderildi.');
        }

        return view('sayfalar/iletisim');
    }

    // Gelen iletileri listeleme
    public function iletiler()
    {
        $data['iletisimler'] = $this->panelModel->getAllMessages();
        return view('sayfalar/iletisim_liste', $data);
    }
}