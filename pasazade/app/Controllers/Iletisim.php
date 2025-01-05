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
    <?php if (!empty($iletisimler)): ?>
        <?php foreach ($iletisimler as $iletisim): ?>
            <tr>
                <td><?= $iletisim['ad_soyad'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['e_mail'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['konu'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['telefon'] ?? 'Bilinmiyor' ?></td>
                <td><?= $iletisim['mesaj'] ?? 'Bilinmiyor' ?></td>
                <td><?= empty($iletisim['cevap']) ? 'Henüz cevaplanmadı' : $iletisim['cevap'] ?></td>
                <td>
                    <form action="<?= base_url('admin/cevapla/' . (string) $iletisim['_id']) ?>" method="post">
                        <input type="text" name="cevap" placeholder="Cevabınızı yazın" required>
                        <button type="submit">Cevapla</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Henüz herhangi bir iletişim mesajı yok.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
