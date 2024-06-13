<?= $this->extend('layout/backsite/template'); ?>
<?= $this->section('content') ?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    <?php  if (session()->getFlashdata('pesan')) : ?>
						<div class="alert alert-success text-dark" role="alert">
							<?= session()->getFlashdata('pesan'); ?>
						</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="row tab-content">
								<div id="list-view" class="tab-pane fade active show col-lg-12">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title"></h4>

										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example3" class="display" style="min-width: 845px">
													<thead>
														<tr>
															<th>Nama</th>
															<th>Deskripsi</th>
															<th>Link</th>
														</tr>
													</thead>
                                                <?php foreach ($settings as $b):?>
                                                    <tbody>
                                                        <tr>
                                                            <td>Website Name</td>
                                                            <td><?= $b['website_name']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>phone_number1</td>
                                                            <td><?= $b['phone_number1']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>phone_number2</td>
                                                            <td><?= $b['phone_number2']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>email1</td>
                                                            <td><?= $b['email1']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>email2</td>
                                                            <td><?= $b['email2']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>address</td>
                                                            <td><?= $b['address']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>maps</td>
                                                            <td>-</td>
                                                            <td><?= $b['maps']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>logo</td>
                                                            <td>-</td>
                                                            <td><?= $b['logo']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>facebook</td>
                                                            <td>-</td>
                                                            <td><?= $b['facebook_url']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>instagram</td>
                                                            <td>-</td>
                                                            <td><?= $b['instagram_url']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>youtube</td>
                                                            <td>-</td>
                                                            <td><?= $b['youtube_url']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>header_business_hour</td>
                                                            <td><?= $b['header_business_hour']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>time_business_hour</td>
                                                            <td><?= $b['time_business_hour']; ?></td>
                                                            <td>-</td>
                                                        </tr>
                                                    </tbody>
                                                <?php endforeach;?>
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