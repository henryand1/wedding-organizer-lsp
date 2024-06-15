<!--Navbar-->
<header class="sticky-top">
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-2" style="background-color: #E9E2D8">
        <div class="container">
          <a class="navbar-brand" href="/" style="color: #836944">
          <img class="logo" src="<?= base_url('assets/backsite/images/logo.png'); ?>" width="80"  alt="">
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse gap-5" id="navbarSupportedContent" style="background-color: #E9E2D8">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-sm-5">
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="/contacts">Kontak Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="/katalogOrder">Katalog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="/listpesanan">Cek Pesanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="/homepage">Beranda</a>
              </li>
            </ul>
            <!-- Jika pengguna belum login -->
            <?php if (!session('logged_in')) : ?>
              <a href="/login" >
              <button class="btn logout rounded-pill px-5 fw-semibold mx-2 mb-2 text-light text-uppercase word-break" type="submit" style="">
                Login
              </button></a>
            <!-- Jika pengguna sudah login -->
            <?php else : ?>
              <a href="/logout">
              <button class="btn logout rounded-pill px-5 fw-semibold mx-2 mb-2 text-light text-uppercase word-break" type="submit" style="">
                Logout
              </button></a>
              <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>
    