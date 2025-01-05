<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require ROOTPATH . 'vendor/autoload.php';

try {

    $client = new MongoDB\Client("mongodb://localhost:27017");


    $db = $client->mail;
    $collection = $db->iletisim;


    $iletisimler = $collection->find()->toArray();
} catch (Exception $e) {

    echo "MongoDB bağlantısı başarısız: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Mesajları</title>
</head>
<body>
<h2>Gelen İletiler</h2>

<?php if (!empty($iletisimler)): ?>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>Email</th>
            <th>Konu</th>
            <th>Telefon</th>
            <th>Mesaj</th>
            <th>Cevap</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($iletisimler as $iletisim): ?>
            <tr>
                <td><?= $iletisim['ad_soyad'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['e_mail'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['konu'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['telefon'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['mesaj'] ?? 'Bilinmiyor' ?></td>
                <td><?= empty($iletisim['cevap']) ? 'Henüz cevaplanmadı' : $iletisim['cevap'] ?></td>
                <td>
                    <form action="<?= base_url('admin/cevapla/' . $iletisim['_id']) ?>" method="post">
                        <input type="text" name="cevap" placeholder="Cevabınızı yazın" required>
                        <button type="submit">Cevapla</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Henüz herhangi bir iletişim mesajı yok.</p>
<?php endif; ?>
</body>
</html>
