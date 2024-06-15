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
												<table id="example3" class="display" style="min-width: 100%">
													<thead>
														<tr>
															<th>No Booking</th>
															<th>Nama Paket</th>
															<th>Pemesan</th>
															<th>Status</th>
														</tr>
													</thead>
                                                    <?php foreach ($orderItem as $order): ?>
                                                        <tr style="background-color:#ffffff">
                                                            <td><?= $order['order_id'] ?></td>
                                                            <td><?= $order['package_name'] ?></td>
                                                            <td><?= $order['name'] ?></td>
                                                            <td><?= $order['status'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
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

<?= $this->endSection('content') ?>