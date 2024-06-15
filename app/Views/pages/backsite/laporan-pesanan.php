<?= $this->extend('layout/backsite/template'); ?>
<?= $this->section('content') ?>

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
                                <form method="post" action="submiteditorder" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>No Booking</th>
                                                        <th>Pemesan</th>
                                                        <th>Paket</th>
                                                        <th>Tanggal Booking</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach ($orderItem as $order): ?>
                                                    <tr style="background-color:#ffffff">
                                                        <td><?= $order['order_id'] ?></td>
                                                        <td><?= $order['name'] ?></td>
                                                        <td><?= $order['package_name'] ?></td>
                                                        <td><?= $order['wedding_date'] ?></td>
                                                        <td>
                                                            <input type="hidden" name="order_id[]" value="<?= $order['order_id'] ?>">
                                                            <select name="status[]">
                                                                <option value="requested" <?= ($order['status'] == 'REQUSTED') ? 'selected' : '' ?>>REQUSTED</option>
                                                                <option value="approved" <?= ($order['status'] == 'APPROVED') ? 'selected' : '' ?>>APPROVED</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5 mb-4 mt-5">
                                            <button class="btn btn-success me-md-2" type="submit" value="Click me">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<?= $this->endSection('content') ?>