<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<!--SATU-->
<style>
        .custom-text {
            color: #8b5e34; /* Warna teks yang diinginkan */
        }
        .card-custom {
            border: none;
            background-color: transparent;
        }
        .card-body-custom {
            padding: 0;
        }
        .price-section {
            text-align: right;
        }
        .price-section p {
            margin-bottom: 10px;
            color: #8b5e34;
            font-size: 1.2rem;
        }
        .btn-custom {
            background-color: #8b5e34;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #6b4a28;
        }
    </style>
</head>
<body>

<main class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="custom-text"><u><?= $katalog['package_name'] ?></u></h2>
            </div>
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-body card-body-custom">
                    <img src="<?= base_url('DataKatalog/' . $katalog['image']); ?>" class="img-fluid" style="max-width:500px" alt="<?= $katalog['package_name'] ?>">
                    <h5 class="mt-4 custom-text"><?= $katalog['description'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 price-section">
                <h4 class="custom-text"><u>Harga</u></h4>
                <h2 class="custom-text mb-4">Rp <?= number_format($katalog['price'], 0, ',', '.') ?></h2>
                <a href="<?= base_url('bookOrder/' . $katalog['catalogue_id']) ?>" class="btn btn-custom">Book Now</a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection('content') ?>