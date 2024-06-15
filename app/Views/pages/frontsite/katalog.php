<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>
<style>
  .card-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
  }
  .card-custom {
      flex: 1 1 300px; /* Membuat ukuran kartu tetap */
      max-width: 300px;
  }
  .card-body-custom {
      background-color: #8b5e34;
      color: white;
      min-height: 120px;
  }
  .card-body-link {
      background-color: #8b5e34;
      color: white;
      border-radius: 0 0 10px 10px;
  }
  .card-title {
      color: #8b5e34;
  }
  .custom-text {
      color: #8b5e34; /* Warna teks yang diinginkan */
  }
</style>
<!--SATU-->
<main class="">
      
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary rounded-2" tabindex="0">
            
  
          <!--DUA-->
          <div id="scrollspyHeading2">
          <div class="container text-center">
            <h2 class="custom-text mb-5 mt-5">Choose the wedding you want</h2>
            <div class="card-container">
            <?php foreach ($katalog as $item): ?>
                <div class="card card-custom">
                    <div class="card-body">
                        <img src="<?= base_url('DataKatalog/' . $item['image']) ?>" alt="<?= $item['package_name'] ?>" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['package_name'] ?></h5>
                    </div>
                    <div class="card-body card-body-custom">
                        <p class="text-white"><?= $item['description'] ?></p>
                    </div>
                    <div class="card-body card-body-link">
                        <a href="/detailKatalog/<?= $item['catalogue_id'] ?>" class="btn btn-link text-white">Lihat lebih detail >></a>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Paket C</h5>
                    </div>
                    <div class="card-body card-body-custom">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer scelerisque quam sem, quis ultricies odio blandit sit amet.</p>
                        <a href="#" class="btn btn-link text-white">Lihat lebih detail >></a>
                    </div>
                </div> -->
            </div>
          </div>

          <!--TIGA-->

      </main>
<?= $this->endSection('content') ?>