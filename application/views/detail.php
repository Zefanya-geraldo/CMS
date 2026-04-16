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
        
        /* Content Section */
        .content-wrapper { padding: 60px 0; background: #ffffff; }
        .article-header { margin-bottom: 40px; }
        .article-header img { width: 100%; height: auto; max-height: 500px; object-fit: cover; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(27,94,32,0.15); opacity: 1; }
        .article-header h1 { font-size: 42px; font-weight: 700; color: #000000; margin-bottom: 20px; line-height: 1.3; }
        .article-meta { display: flex; gap: 30px; padding: 20px; background: #f5f5f5; border-radius: 8px; margin-bottom: 30px; flex-wrap: wrap; border: 1px solid #e0e0e0; }
        .article-meta-item { display: flex; align-items: center; gap: 8px; color: #555555; font-size: 14px; }
        .article-meta-item i { color: #2e7d32; font-size: 16px; }
        .article-content { line-height: 1.8; color: #333333; font-size: 16px; }
        .article-content p { margin-bottom: 20px; text-align: justify; }
        
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
    </style>
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
                        <nav class="navigation navbar navbar-expand-md navbar-dark">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') && $this->uri->segment(2) != 'kategori' && $this->uri->segment(2) != 'artikel' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a></li>
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

    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <article class="article-header">
                        <img src="<?= base_url('assets/upload/konten/'.$konten->foto) ?>" alt="<?= $konten->judul; ?>">
                        <h1><?= $konten->judul; ?></h1>
                        <div class="article-meta">
                            <div class="article-meta-item">
                                <i class="fa fa-user"></i>
                                <span><?= $konten->nama; ?></span>
                            </div>
                            <div class="article-meta-item">
                                <i class="fa fa-tag"></i>
                                <span><?= $konten->nama_kategori; ?></span>
                            </div>
                            <div class="article-meta-item">
                                <i class="fa fa-calendar"></i>
                                <span><?= $konten->tanggal; ?></span>
                            </div>
                        </div>
                        <div class="article-content">
                            <?= nl2br($konten->keterangan); ?>
                        </div>
                    </article>
                </div>
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
</body>
</html>