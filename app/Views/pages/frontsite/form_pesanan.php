<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<div class="container mb-5" style="margin-top: 50px;">
    <form method="post" action="submitPesan" enctype="multipart/form-data">
    <h3 class="card-title fw-bold ms-4 mt-3 mb-3">Form Pesan</h3>
        <div class="datadiri card" style="width: 100%; color:#F5F5F5">
            <div class="row align-items-start ms-1 mt-3">
                <div class="col ms-2 me-1">
                    <div class="mb-4">
                        <label class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="no_hp" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Alamat Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggalNikah">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Pilihan Paket Wedding</label>
                        <select id="paket" name="paket" class="form-select" aria-label="Default select example">
                            <option selected disabled>--Pilih Paket--</option>
                            <?php foreach ($katalog as $item): ?>
                                <option value="<?= $item['package_name']; ?>"><?= $item['package_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <!--BUTTON SUBMIT-->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5 mb-4 mt-5">
                    <button class="btn btn-success me-md-2" type="submit" value="Click me">Simpan</button>
                    <button class="btn btn-danger" type="button">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection('content') ?>