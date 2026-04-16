<div class="page-heading">
    <h3>Statistik Website</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Konten</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_konten; ?></h6> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Kategori</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_kategori; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Carousel</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_carousel; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">User Admin</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_user; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Konten Terbaru</h4>
                        </div>
                        <div class="card-body">
                           <?php if(count($konten_terbaru) > 0) { ?>
                           <div class="table-responsive">
                               <table class="table table-hover">
                                   <thead>
                                       <tr>
                                           <th>Judul</th>
                                           <th>Kategori</th>
                                           <th>Penulis</th>
                                           <th>Tanggal</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach($konten_terbaru as $kt) { ?>
                                       <tr>
                                           <td><?= substr($kt['judul'], 0, 30); ?></td>
                                           <td><span class="badge bg-primary"><?= $kt['nama_kategori']; ?></span></td>
                                           <td><?= $kt['nama']; ?></td>
                                           <td><?= date('d-m-Y', strtotime($kt['tanggal'])); ?></td>
                                       </tr>
                                       <?php } ?>
                                   </tbody>
                               </table>
                           </div>
                           <?php } else { ?>
                           <p>Belum ada konten yang diupload.</p>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url('assets/admin/images/faces/1.jpg') ?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Admin</h5>
                            <h6 class="text-muted mb-0">@admin</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>