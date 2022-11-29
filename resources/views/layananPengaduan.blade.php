<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <title>SI EMAS - Sekretariat DPRD Provinsi Maluku</title>

    <!-- Bootstrap core CSS -->
    <link href="/lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/lp/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/lp/assets/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="/lp/assets/css/owl.css">
    <link rel="stylesheet" href="/lp/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="/lp/assets/images/logo-2.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="#top" class="active">Pengaduan</a></li>
                            <!-- <li><a href="details.html">Tentang</a></li>
                      <li><a href="author.html">Contact</a></li> -->
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading normal-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Sistem Pengaduan Masyarakat</h6>
                    <h2>BUAT LAPORAN ANDA SEKARANG.</h2>
                    <!-- <span>Home > <a href="#">Pengaduan</a></span> --> <br>
                    <div class="buttons">
                        <div class="border-button">
                            <a href="#pengaduan">Buat Pengaduan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="item-details-page" id="pengaduan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Buat Laporan <em>Pengaduan</em> Anda Disini.</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form id="contact" action="/tambah-pengaduan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="title">Nama Anda</label>
                                    <input type="title" name="nama_pengadu" id="title" placeholder="Nama Lengkap"
                                        autocomplete="off" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="description">Kontak Anda</label>
                                    <input type="description" name="kontak_pengadu" id="description"
                                        placeholder="No Hp / Email" autocomplete="off" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="username">Tanda Pengenal/Identitas</label>
                                    <input type="file" id="file" name="identitas" />
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="price">Pengaduan</label>
                                    <input type="price" name="pengaduan" id="price" placeholder="" autocomplete="off"
                                        required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="price">Lokasi Pengaduan</label>
                                    <input type="price" name="lokasi_pengaduan" id="price" placeholder=""
                                        autocomplete="off" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="royalities">Dokumentasi Pengaduan</label>
                                    <input type="file" id="file" name="images[]" multiple />
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="file">Keterangan Pengaduan</label>
                                    <textarea name="keterangan_pengaduan" id=""
                                        style="width: 100%; height: 230px;"></textarea>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Kirim Laporan Pengaduan
                                        Anda</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Mengenai Laporan <em>Pengaduan</em> Anda.</h2>
                    </div>
                </div>
                <div class="col-lg-12 align-self-center text-center">
                    <h4>Sekretariat DPRD Provinsi Maluku</h4>
                    <p>Terima Kasih Telah Menggunakan Fasilitas pada Aplikasi Proyek Perubahan DPRD Provinsi Maluku.
                        <br>
                        Sesegera Mungkin Laporan Anda Akan Kami Proses dan Di Tujukan Kepada Pimpinan/Anggota Dewan
                        Sebagai Bahan Pengaduan Masyarakat. <br> Laporan Pengaduan Anda Akan Kami Infokan Melalui Kontak
                        Yang Anda Berikan Kepada Kami.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2022 Sekretariat <a href="https://www.dprd.malukuprov.go.id/" target="_blank">DPRD
                            Provinsi Maluku</a>.
                        &nbsp;&nbsp;
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/lp/vendor/jquery/jquery.min.js"></script>
    <script src="/lp/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/lp/assets/js/isotope.min.js"></script>
    <script src="/lp/assets/js/owl-carousel.js"></script>
    <script src="/lp/assets/js/wow.js"></script>
    <script src="/lp/assets/js/tabs.js"></script>
    <script src="/lp/assets/js/popup.js"></script>
    <script src="/lp/assets/js/custom.js"></script>

    @include('sweetalert::alert')
</body>

</html>