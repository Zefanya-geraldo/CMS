<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background: #ffffff; color: #000000; }
        
        /* Header */
        .header { background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); padding: 20px 0; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .logo a { text-decoration: none; color: white !important; font-size: 24px; font-weight: 700; }
        .navbar-dark .navbar-nav .nav-link { color: rgba(255,255,255,0.85) !important; transition: all 0.3s; padding: 8px 16px; border-radius: 4px; }
        .navbar-dark .navbar-nav .nav-link:hover { color: white !important; background: rgba(255,255,255,0.1); }
        .navbar-dark .navbar-nav .nav-link.active { color: white !important; background: rgba(255,255,255,0.25); font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.2); }
        
        /* Loader */
        .loader_bg { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255,255,255,0.95); display: none; justify-content: center; align-items: center; z-index: 9999; }
        .loader_bg.active { display: flex; }
        .loader img { width: 50px; height: 50px; }
        
        /* Banner */
        .banner_main { background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); }
        .carousel { position: relative; }
        .carousel-item { position: relative; min-height: 600px; }
        .carousel-item img { width: 100%; height: 600px; object-fit: cover; display: block; }
        .carousel-caption { background: rgba(0,0,0,0.5); padding: 30px; border-radius: 10px; bottom: 50px; }
        .carousel-caption h1 { color: white; font-size: 48px; font-weight: 700; margin-bottom: 15px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
        .carousel-caption p { color: #e8f5e9; font-size: 18px; text-shadow: 1px 1px 3px rgba(0,0,0,0.5); }
        .carousel-control-prev, .carousel-control-next { width: 60px; background: rgba(0,0,0,0.3); border-radius: 4px; }
        .carousel-control-prev:hover, .carousel-control-next:hover { background: rgba(0,0,0,0.6); }
        .carousel-indicators { bottom: 20px; }
        .carousel-indicators button { width: 12px; height: 12px; border-radius: 50%; background: rgba(255,255,255,0.5); border: 2px solid white; margin: 0 6px; transition: all 0.3s; }
        .carousel-indicators .active { background: white; width: 14px; height: 14px; }
        
        /* Content Section */
        .wedo { padding: 60px 0; background: #ffffff; }
        .titlepage h2 { font-size: 42px; font-weight: 700; color: #000000; margin-bottom: 10px; }
        .titlepage p { font-size: 16px; color: #666666; }
        .wedo_box { background: #f5f5f5; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: all 0.3s; border: 1px solid #e0e0e0; }
        .wedo_box:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(27,94,32,0.15); border-color: #2e7d32; }
        .wedo_box img { width: 100%; height: 250px; object-fit: cover; }
        .wedo_box h3 { padding: 20px 20px 10px 20px; font-size: 20px; font-weight: 600; color: #000000; }
        .wedo_box p { padding: 0 20px; color: #555555; font-size: 14px; line-height: 1.6; }
        .read_more { display: inline-block; margin: 20px; padding: 10px 20px; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; text-decoration: none; border-radius: 5px; transition: all 0.3s; font-weight: 600; }
        .read_more:hover { transform: scale(1.05); text-decoration: none; color: white; box-shadow: 0 4px 15px rgba(27,94,32,0.4); }
        
        /* Footer */
        footer { background: #2e2e2e; color: white; padding: 60px 0 0 0; margin-top: 60px; }
        .footer { padding: 40px 0; background: #2e2e2e; }
        .footer h3 { font-size: 18px; font-weight: 700; margin-bottom: 20px; color: #ffffff; }
        .footer p { color: #cccccc; line-height: 1.8; font-size: 14px; }
        .location_icon { list-style: none; }
        .location_icon li { margin-bottom: 15px; color: #cccccc; display: flex; align-items: center; gap: 10px; }
        .location_icon i { color: #2e7d32; font-size: 16px; }
        .social_icon { list-style: none; display: flex; gap: 15px; }
        .social_icon a { display: inline-flex; justify-content: center; align-items: center; width: 40px; height: 40px; background: #2e7d32; color: white; border-radius: 50%; transition: all 0.3s; text-decoration: none; }
        .social_icon a:hover { background: #1b5e20; transform: scale(1.1); text-decoration: none; }
        .copyright { background: #1a1a1a; padding: 20px 0; text-align: center; color: #777777; font-size: 14px; }
    </style>
</head>

<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="<?= base_url('assets/dasher/public/images/png/loading.gif') ?>" alt="#" /></div>
    </div>

    <header>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="<?= base_url() ?>" style="color: #fff; font-size: 26px; font-weight: bold;">
                                        <?= $konfig->judul_website; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a></li>
                                    <?php foreach($kategori as $kat) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($this->uri->segment(2) == 'kategori' && $this->uri->segment(3) == $kat['id_kategori']) ? 'active' : '' ?>" href="<?= base_url('home/kategori/'.$kat['id_kategori']) ?>">
                                            <?= $kat['nama_kategori'] ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($this->uri->segment(1) == 'auth') ? 'active' : '' ?>" href="<?= base_url('auth') ?>">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="banner_main">
        <div id="myCarousel" class="carousel slide banner" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <?php $no=0; foreach($carousel as $aa) { ?>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?= $no ?>" <?= $no == 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $no+1 ?>"></button>
                <?php $no++; } ?>
            </div>
            <div class="carousel-inner">
                <?php $no=0; foreach($carousel as $aa) { ?>
                <div class="carousel-item <?= $no == 0 ? 'active' : '' ?>">
                    <img src="<?= base_url('assets/upload/carousel/'.$aa['foto']) ?>" alt="Unit Mobil" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h1><?= $aa['judul'] ?></h1>
                    </div>
                </div>
                <?php $no++; } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <div class="wedo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Koleksi Unit Kami</h2>
                        <p>Unit mobil berkualitas dengan harga bersaing</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($konten as $ktn) { ?>
                <div class="col-md-4 mb-4">
                    <div class="wedo_box">
                        <i><img src="<?= base_url('assets/upload/konten/'.$ktn['foto']) ?>" alt="#"/></i>
                        <h3><?= $ktn['judul'] ?></h3>
                        <p><?= substr($ktn['keterangan'], 0, 70) ?>...</p>
                        <a class="read_more" href="<?= base_url('home/artikel/'.$ktn['slug']) ?>">Lihat Detail</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Tentang Kami</h3>
                        <p><?= $konfig->profil_website; ?></p>
                    </div>
                    <div class="col-md-4">
                        <h3>Kontak Kami</h3>
                        <ul class="location_icon">
                            <li><i class="fa fa-map-marker"></i> <?= $konfig->alamat; ?></li>
                            <li><i class="fa fa-envelope"></i> <?= $konfig->email; ?></li>
                            <li><i class="fa fa-phone"></i> <?= $konfig->no_wa; ?></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Sosial Media</h3>
                        <ul class="social_icon">
                            <li><a href="<?= $konfig->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= $konfig->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>