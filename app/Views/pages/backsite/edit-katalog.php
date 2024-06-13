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
                            <h4>Edit Katalog</h4>
                        </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
							<div class="card-body">
                                <form action="/backsite/submiteditkatalog/<?= $katalog['catalogue_id'] ?>" method="post" enctype="multipart/form-data>
									<div class="row">
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nama Paket</label>
												<input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" value="<?= old('name', isset($input['name']) ? $input['name'] : $katalog['package_name']); ?>" >
												<div class="invalid-feedback">
													<?= $validation->getError('name'); ?>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Harga</label>
												<input type="text" name="price" class="form-control" id="price" value="<?=  old('price', isset($input['price']) ? $input['price'] : $katalog['price']); ?>" >
												<div class="invalid-feedback">
													<?= $validation->getError('price'); ?>
												</div>
											</div>
										</div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea name="deskripsi" style="width: 100%; height: 150px;" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi"> <?= old('deskripsi', isset($input['deskripsi']) ? $input['deskripsi'] : $katalog['description']); ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('deskripsi'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 mt-3">
                                        <div class="form-group">
                                            <label>Upload Foto </label>
                                            <input class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" type="file" name="image" id="image" accept="image/jpeg, image/png">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('image'); ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($katalog['image'])): ?>
                                            <div class="form-group mt-2">
                                                <label>Current Image:</label><br>
                                                <img src="<?= base_url('DataKatalog/' . $katalog['image']) ?>" alt="Current Image" style="max-width: 100px;">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 mt-3">
											<div class="form-group">
												<label>Status </label><br/>
                                                <select id="status" name="status">
                                                    <option value="Y"<?= $katalog['status_publish'] == 'Y' ? 'selected' : ''; ?>>Publish</option>
                                                    <option value="N"<?= $katalog['status_publish'] == 'N' ? 'selected' : ''; ?>>Not Publish</option>
                                                </select>
											</div>
										</div>
					
										<div class="col-lg-12 col-md-12 col-sm-12">
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