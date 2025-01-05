<!DOCTYPE html>
<html lang="tr" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<body>
<div class="container">
    <div class="row padding-60 col-lg-7 contact-team">

        <h3 class="text-center">Giriş <span>Yapınız</span></h3>
        <?= validation_list_errors() ?>
        <?PHP
        if (isset($uyari))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo $uyari;
            echo '</div>';
        }
        ?>
        <form action="<?=base_url()?>login" method="post">
            <?=csrf_field()?>
            <div class="form-group">
                <label for="kulad"> Kullanıcı Adı </label>
                <input type="text" class="form-control" id="kulad" name="kulad" placeholder="Kullanıcı Adı*">
            </div>
            <div class="form-group">
                <label for="sifre"> Şifre </label>
                <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifrenizi Giriniz*">
            </div>
            <div class="col col-sm-12 text-center">
                <input type="submit" name="gonder" class="btn btn-default btn-style hvr-shutter-out-vertical" value="Giriş Yap">
            </div>

        </form>
    </div>
</div>

</body>
</html>