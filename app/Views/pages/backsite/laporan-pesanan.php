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


<?= $this->endSection('content') ?>