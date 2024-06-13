<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<div class="container mb-5" style="margin-top: 50px;">
    <form method="post" action="<?= base_url('camaba/submit-data-diri') ?>" enctype="multipart/form-data">
    <h3 class="card-title fw-bold ms-4 mt-3 mb-3">Form Pesan</h3>
        <div class="datadiri card" style="width: 100%;">
            <!--DATA PRIBADI-->

            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-info " role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>
<!--coba-->
            <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
<!--coba-->



            <div class="row align-items-start ms-1 mt-3">
                <div class="col ms-2 me-1">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="no_hp" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Pilihan Paket Wedding</label>
                        <select id="paket" name="paket" class="form-select" aria-label="Default select example">
                            <option selected disabled>--Pilih Paket--</option>

                        </select>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#prodi1').select2();
                            });
                        </script>
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

<script src="<?= base_url('js/sweetalert2.all.min.js') ?>"></script>
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "User akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#143b64',
            cancelButtonColor: '#ff8f16',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect atau panggil fungsi deleteData() untuk menghapus data
                deleteData(id);
            }
        });
    }

    function deleteData(id) {
        window.location.href = "/backsite/user/delete/" + id;
    }
</script>

<?= $this->endSection('content') ?>