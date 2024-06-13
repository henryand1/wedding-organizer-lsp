<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row tab-content">
								<div id="list-view" class="tab-pane fade active show col-lg-12">
									<div class="card mt-4">
										<div class="card-header">
											<h4 class="card-title">List Pesanan</h4>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example3" class="display" style="min-width: 845px">
													<thead>
														<tr>
															<th>No Booking</th>
															<th>Nama Paket</th>
															<th>Pemesan</th>
															<th>Status</th>
														</tr>
													</thead>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

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