<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Admin - Mazer</title>

<link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/app.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/app-dark.css') ?>">    
<link rel="stylesheet" href="<?= base_url('assets/admin/css/iconly.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') ?>">    
<link rel="shortcut icon" href="<?= base_url('assets/admin/images/logo/favicon.svg') ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?= base_url('assets/admin/images/logo/favicon.png') ?>" type="image/png">

</head>

<body>
    <div id="app">
        
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="<?= base_url('admin/home') ?>">CMS Kita</a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu Utama</li>

                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/home') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'user') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/user') ?>" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                 <span>User</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'carousel') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/carousel') ?>" class='sidebar-link'>
                                <i class="bi bi-images"></i>
                                <span>Carousel</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'kategori') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/kategori') ?>" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Kategori</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'konten') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/konten') ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-text-fill"></i>
                                <span>Konten</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'konfigurasi') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/konfigurasi') ?>" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Konfigurasi</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($this->uri->segment(2) == 'logout') ? 'active' : '' ?>">
                            <a href="<?= base_url('auth/logout') ?>" class='sidebar-link' onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3><?= $judul_halaman ?></h3>
            </div>

            <div class="page-content">
                <?= $contents; ?>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/admin/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/main.js') ?>"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#ngilang').delay(3000).fadeOut('slow');
    </script>
</body>
</html>