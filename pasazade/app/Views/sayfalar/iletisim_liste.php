<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Composer autoloader

try {
    // MongoDB bağlantısı
    $client = new MongoDB\Client("mongodb://localhost:27017");

    // Veritabanı ve koleksiyon seçimi
    $db = $client->mail; // mail veritabanı
    $collection = $db->iletisim; // iletisim koleksiyonu

    // Verileri çekme
    $iletisimler = $collection->find()->toArray(); // Tüm veriyi çekiyoruz

    // Veriyi kontrol etme (debug)
    var_dump($iletisimler);
} catch (Exception $e) {
    echo "MongoDB bağlantısı başarısız: " . $e->getMessage();
}
?>
<h2>Gelen İletiler</h2>
<?php
// MongoDB verilerini çekme kodu buraya yerleştirilecek
if (!empty($iletisimler)): ?>
    <table>
        <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>Email</th>
            <th>Konu</th>
            <th>Telefon</th>
            <th>Mesaj</th>
            <th>Cevap</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($iletisimler as $iletisim): ?>
            <tr>
                <td><?= htmlspecialchars($iletisim['ad_soyad']) ?></td>
                <td><?= htmlspecialchars($iletisim['e_mail']) ?></td>
                <td><?= htmlspecialchars($iletisim['konu']) ?></td>
                <td><?= htmlspecialchars($iletisim['telefon']) ?></td>
                <td><?= htmlspecialchars($iletisim['mesaj']) ?></td>
                <td><?= htmlspecialchars($iletisim['cevap'] ?: 'Henüz cevaplanmadı') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Henüz iletiler yok.</p>
<?php endif; ?>
