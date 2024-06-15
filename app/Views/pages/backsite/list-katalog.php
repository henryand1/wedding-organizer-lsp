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
											<a href="/backsite/add-katalog" class="btn btn-secondary">+ Add new</a>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example3" class="display" style="min-width: 845px">
													<thead>
														<tr>
															<th>Nama Paket</th>
															<th>Harga</th>
															<th>Status Publish</th>
															<th>Action</th>
														</tr>
													</thead>
                                                <?php foreach ($katalog as $item): ?>
                                                    <tr>
                                                        <td><?= $item['package_name'] ?></td>
                                                        <td><?= number_format($item['price'], 0, ',', '.') ?></td>
                                                        <td><?= $item['status_publish'] == 'Y' ? 'Publish' : 'Not Publish' ?></td>
                                                        <td>
                                                            <a href="/backsite/edit-katalog/<?= $item['catalogue_id'] ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            <button class="btn btn-sm btn-danger" onclick="deleteConfirmation('<?= $item['catalogue_id'] ?>')"><i class="la la-trash-o"></i></button>
                                                        </td>
                                                        <!-- other columns -->
                                                    </tr>
                                                <?php endforeach; ?>
                                        </tbody>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Katalog akan dihapus secara permanen!",
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
        window.location.href = "/backsite/deletekatalog/" + id;
    }
</script>

<?= $this->endSection('content') ?>