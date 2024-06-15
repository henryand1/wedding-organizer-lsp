<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<!--SATU-->
<main class="">
          <?php foreach ($settings as $b):?>
          <div id="scrollspyHeading2">
          <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p><i class="bi bi-geo-alt-fill me-2"></i><?= $b['address']; ?></p>
                    <p><?= $b['maps']; ?></p>
                </div>
                <div class="col-md-6 ml-5" style="color:#836944;padding-left:200px">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled justify-left">
                        <li><i class="bi bi-telephone-fill me-4"></i><?= $b['phone_number1']; ?></li>
                        <li><i class="bi bi-telephone-fill me-4" style="visibility: hidden;"></i><?= $b['phone_number2']; ?></li>
                        <li><i class="bi bi-envelope-fill me-4"></i><?= $b['email1']; ?></li>
                        <li><i class="bi bi-telephone-fill me-4" style="visibility: hidden;"></i><?= $b['email2']; ?></li>
                        <li><i class="bi bi-facebook me-4"></i><?= $b['facebook_url']; ?></li>
                        <li><i class="bi bi-instagram me-4"></i><?= $b['instagram_url']; ?></li>
                        <li><i class="bi bi-youtube me-4"></i><?= $b['youtube_url']; ?></li><br/>
                        <li><i class="bi bi-calendar me-4"></i><?= $b['time_business_hour']; ?></li>
                        <li><i class="bi bi-clock me-4"></i><?= $b['header_business_hour']; ?></li>
                    </ul>
                    <?php endforeach;?>
                </div>
            </div>
    </div>

          <!--TIGA-->

      </main>
<?= $this->endSection('content') ?>