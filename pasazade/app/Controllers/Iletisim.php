<h2>Gelen İletiler</h2>
<table>
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
            <td><?= $iletisim['ad_soyad'] ?></td>
            <td><?= $iletisim['e_mail'] ?></td>
            <td><?= $iletisim['konu'] ?></td>
            <td><?= $iletisim['telefon'] ?></td>
            <td><?= $iletisim['mesaj'] ?></td>
            <td><?= $iletisim['cevap'] ?: 'Henüz cevaplanmadı' ?></td>
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
