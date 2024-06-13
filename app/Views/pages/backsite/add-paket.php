<?= $this->extend('layout/backsite/template'); ?>
<?= $this->section('content') ?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Tambah Paket</h4>
                        </div>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							
							<div class="card-body">
								<form action="/backsite/addpaket" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nama Paket</label>
												<input type="text" class="form-control" id="nama_paket" name="nama_paket">
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12 mt-3">
											<div class="form-group">
												<label class="form-label">Harga</label>
												<input type="text" class="form-control" name="harga" id="harga">
											</div>
										</div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 mt-3">
											<div class="form-group">
												<label class="form-label">Deskripsi</label>
												<textarea type="text" class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
											</div>
										</div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 mt-3">
											<div class="form-group">
												<label>Upload Foto </label>
                                                <input class="form-control" type="file" name="foto" accept="image/jpeg, image/png">
                                            </select>
											</div>
										</div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 mt-3">
											<div class="form-group">
												<label>Status </label><br/>
                                            <select id="status" name="status">
												<option value="Y">Publish</option>
												<option value="N">Not Publish</option>
                                            </select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 mt-5">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button class="btn btn-light"><a href="/backsite/listkatalog" class="text-dark">Cancel</a></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


<?= $this->endSection('content') ?>