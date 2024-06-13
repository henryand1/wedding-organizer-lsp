<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<!--SATU-->
<main class="">
      
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary rounded-2" tabindex="0">
  
          <div id="scrollspyHeading1" >
          <div class="container-fluid p-0 mb-3">
            <div class="">
                <img src="<?= base_url('assets/frontsite/images/home.jpg'); ?>" class="img-fluid w-100" alt="...">
            </div>
          </div>
            
  
          <!--DUA-->
          <div id="scrollspyHeading2">
          <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="<?= base_url('assets/frontsite/images/home.jpg'); ?>" class="img-fluid" alt="Wedding Image">
                </div>
                <div class="col-md-6 text-center" style="color:#836944">
                    <h2 class="custom-text">We Are Here For You</h2>
                    <a class="" href="/katalogOrder" style="color:#836944">Katalog >></a>
                </div>
            </div>
    </div>

          <!--TIGA-->

      </main>
<?= $this->endSection('content') ?>