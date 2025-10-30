<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Diskominfo Pamekasan</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="./node_modules/flatpickr/dist/flatpickr.css"/>
    <link rel="stylesheet" href="./node_modules/lineicons/assets/icon-fonts/lineicons.css" />


</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo/diskominfo.svg" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                          <a href="?page=home" class="active" aria-label="Toggle navigation">
                                            <span class="icon">
                                                <i class="lni lni-home-2"></i>
                                            </span>
                                            Dashboard
                                          </a>
                                        </div>
                                    </li>
                                      
                                    <li class="nav-item">
                                        <div class="nav-link">
                                          <a href="?page=profile" class="active" aria-label="Toggle navigation">
                                            <span class="icon">
                                                <i class="lni lni-double-quotes-end-1"></i>
                                            </span>
                                            Profil
                                          </a>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <div class="nav-link">
                                          <a href="?page=login" class="active" aria-label="Toggle navigation">
                                            <span class="icon">
                                              <i class="lni lni-exit"></i>
                                            </span>
                                            Login
                                          </a>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
              <div class="button home-btn">
                <a href="#contact" class="btn">Contact Us</a>
              </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
          <div class="hero-content">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-12 col-12">
                <h1>
                  Dashboard <span class="highlight">Perkembangan</span><br />
                  Harga Pangan
                </h1>
              </div>
            </div>
            <div class="search-container">
              <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                  <label for="datePicker">Pilih Tanggal</label>
                  <div class="dropdown-wrapper">
                      <input type="text" id="datePicker" class="form-control" placeholder="Pilih Tanggal">
                  </div>
                </div>                 
              </div>              
            </div>
            <div class="price-info">
              <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Frontend-only placeholder: carousel disabled (no backend) -->
          <div class="price-container">
            <div class="alert alert-info" role="alert" style="margin-top:12px;">
              Komponen kartu harian sementara dinonaktifkan (frontend-only). Hubungkan API eksternal untuk menampilkan data real.
            </div>
          </div>
        </div>
              </div>
            </div>

            <div class="search-container">
              <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="search-box">
                      <div class="row">
                        <div class="col-md-3 col-6">
                          <label for="variant">Pilih Komoditas</label>
                          <div class="dropdown-wrapper">
                          <select id="variant" class="form-select">
                            <option value="13">Bawang Merah</option>
                            <option value="37">Bawang Bombai</option>
                            <option value="38">Bawang Putih Honan</option>
                            <option selected value="52">Beras Medium</option>
                            <option value="51">Beras Premium</option>
                            <option value="9">Cabai Merah Besar</option>
                            <option value="2">Cabai Merah Keriting</option>
                            <option value="11">Cabai Rawit Hijau</option>
                            <option value="10">Cabai Rawit Merah</option>
                            <option value="43">Daging Ayam Kampung</option>
                            <option value="27">Daging Ayam Ras</option>
                            <option value="19">Daging Sapi</option>
                            <option value="41">Garam Halus</option>
                            <option value="14">Gula Pasir Curah</option>
                            <option value="15">Gula Pasir Kemasan</option>
                            <option value="24">Ikan Bandeng</option>
                            <option value="23">Ikan Teri</option>
                            <option value="20">Ikan Tongkol</option>
                            <option value="55">Jeruk Lokal</option>
                            <option value="58">Kangkung</option>
                            <option value="4">Kacang Panjang</option>
                            <option value="45">Kacang Tanah</option>
                            <option value="46">Kacang Hijau</option>
                            <option value="47">Ketela Pohon</option>
                            <option value="3">Ketimun Sedang</option>
                            <option value="57">Kentang Sedang</option>
                            <option value="28">Kedelai Lokal</option>
                            <option value="48">Kedelai Impor</option>
                            <option value="17">Minyak Goreng Sawit</option>
                            <option value="16">Minyak Goreng Sawit Curah</option>
                            <option value="18">MinyaKita</option>
                            <option value="42">Mie Instan</option>
                            <option value="54">Pisang Lokal</option>
                            <option value="5">Sawi Hijau</option>
                            <option value="31">Susu Kental Manis</option>
                            <option value="32">Susu Bubuk</option>
                            <option value="33">Susu Bubuk Balita</option>
                            <option value="36">Tempe Bungkus</option>
                            <option value="35">Tahu Putih</option>
                            <option value="25">Telur Ayam Ras</option>
                            <option value="44">Telur Ayam Kampung</option>
                            <option value="26">Tepung Terigu</option>
                            <option value="40">Udang Basah</option>
                        </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
              </div>              
            </div>
            <div class="price-section">
                <!-- Grafik Pamekasan -->
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                      <h3 class="table-title">Harga Harian<br><span class="highlight">Nasional, Jawa Timur, Pamekasan</span></h3>
                      <canvas id="chartPamekasan"></canvas>
                  </div>

                  <!-- Grafik Bangkalan -->
                  <div class="col-lg-6 col-md-12">
                      <h3 class="table-title">Harga Harian<br><span class="highlight">Madura</span></h3>
                      <canvas id="chartMadura"></canvas>
                  </div>                
                </div>
            </div>            

            <div class="chart-section">
            <h3 class="table-title">Harga Tahunan<br><span class="highlight">Pamekasan</span></h3>
                <div class="chart-container">
                  <canvas id="priceChart"></canvas>
                </div>
            </div>

            <div class="gallery-section">
              <h3 class="gallery-title text-center">Dokumentasi Diskominfo <span class="highlight">Pamekasan</span></h3>
              <div class="gallery-grid">
                  <div class="row">
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/1.jpg" alt="Dokumentasi 1">
                    </div>
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/2.jpg" alt="Dokumentasi 2">
                    </div>
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/3.jpg" alt="Dokumentasi 3">
                    </div>
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/4.jpg" alt="Dokumentasi 4">
                    </div>
                  </div>
                  <div class="row justify-content-center mt-3">
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/5.jpg" alt="Dokumentasi 1">
                    </div>
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/6.jpg" alt="Dokumentasi 2">
                    </div>
                    <div class="gallery-item col-lg-3 col-md-6 col-12">
                        <img src="./assets/images/gallery/7.jpg" alt="Dokumentasi 3">
                    </div>
                  </div>
              </div>
            </div>

          </div>
        </div>
    </section>
    <!-- End Hero Area -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>📌 Link Pengaduan</h3>
                <p>Laporan Pengaduan klik <a href="https://lapor.go.id">lapor.go.id</a></p>
                <p>Laporan tindak pidana korupsi klik <a href="https://docs.google.com/forms/d/e/1FAIpQLSeGq7QXoo8h-02Om8l6bsNF4Y3OSdDxFNpE5AuJkc3zS9WP2A/viewform">WBS Inspektorat</a></p>
                <p>Pelaporan gratifikasi klik <a href="https://gol.kpk.go.id">gol.kpk.go.id</a></p>
            </div>
      <div class="footer-section" id="contact">
                <h3>📞 Kontak Kami</h3>
                <p>Kantor Dinas Komunikasi dan Informatika Pamekasan</p>
                <p>Jl. Jokotole Gg. IV No. 1, Kel. Barurambat Kota, Kec. Pamekasan, Kabupaten Pamekasan, Jawa Timur 69317</p>
                <p>Email: <a href="mailto:diskominfo@pamekasankab.go.id">diskominfo@pamekasankab.go.id</a></p>
            </div>
            <div class="footer-section map-container">
                <h3>🗺️ Map</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.591785116312!2d113.47447707499984!3d-7.173630492857451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7891c91c9c1df%3A0x87bbf4e3f8e7cf65!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Pamekasan!5e0!3m2!1sid!2sid!4v1718111111111"></iframe>
            </div>
        </div>
        <div class="footer-bottom">
            2025 Dinas Komunikasi dan Informatika Kabupaten Pamekasan
        </div>
    </footer>

    <!-- ========================= scroll-top ========================= -->
     
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
    <div class="sticky-lower-third">
        <div class="marquee-text">
            <span class="highlight">Pemantauan Harga Dilakukan Saat Hari Kerja</span> | Sumber : SP2KP, Kementerian Perdagangan
        </div>
    </div>
    <!-- ========================= JS here ========================= -->
    <!-- Dependencies first -->
    <script src="./node_modules/jquery/dist/jquery.js" defer></script>
    <script src="./node_modules/flatpickr/dist/flatpickr.js" defer></script>
    <script src="./node_modules/chart.js/dist/chart.umd.js" defer></script>
    <script src="./node_modules/alpinejs/dist/cdn.js" defer></script>

    <!-- Vendor scripts -->
    <script src="assets/js/bootstrap.min.js" defer></script>
    <script src="assets/js/wow.min.js" defer></script>
    <script src="assets/js/tiny-slider.js" defer></script>
    <script src="assets/js/glightbox.min.js" defer></script>
    <script src="assets/js/count-up.min.js" defer></script>

    <!-- App scripts -->
    <script src="assets/js/main.js" defer></script>
    <script src="assets/js/changes.js" defer></script>

    <!-- Safety fallback: hide preloader after 3s even if scripts fail -->
    <script>
      window.addEventListener('DOMContentLoaded', function(){
        setTimeout(function(){ var pre=document.querySelector('.preloader'); if(pre){ pre.style.opacity='0'; pre.style.display='none'; } }, 3000);
      });
    </script>

</body>

</html>