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

<main class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="custom-text"><?= $katalog['package_name'] ?></h2>
            </div>
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-body card-body-custom">
                    <img src="<?= base_url('DataKatalog/' . $katalog['image']); ?>" class="img-fluid" alt="<?= $katalog['package_name'] ?>">
                    <p class="mt-4"><?= $katalog['description'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 price-section">
                <p>Harga</p>
                <p><?= number_format($katalog['price'], 0, ',', '.') ?></p>
                <a href="<?= base_url('bookOrder/' . $katalog['catalogue_id']) ?>" class="btn btn-custom">Book Now</a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection('content') ?>