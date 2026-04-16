<div id="ngilang">
    <?= $this->session->flashdata('alert'); ?>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">Manajemen Konten</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKonten">
            <i class="bi bi-plus-lg"></i> Tambah Konten
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Kreator</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($konten as $aa) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $aa['judul']; ?></td>
                        <td><?= $aa['nama_kategori']; ?></td>
                        <td><?= $aa['tanggal']; ?></td>
                        <td><?= $aa['nama']; ?></td>
                        <td>
                            <a href="<?= base_url('assets/upload/konten/'.$aa['foto']) ?>" target="_blank" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-search"></i> Lihat Foto
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/konten/delete_data/'.$aa['foto']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                                <i class="bi bi-trash"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $no ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit<?= $no ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit: <?= $aa['judul'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="<?= base_url('admin/konten/update') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>">
                                    <div class="modal-body">
                                        <div class="mb-3"><label class="form-label">Judul</label>
                                            <input type="text" class="form-control" name="judul" value="<?= $aa['judul'] ?>"></div>
                                        <div class="mb-3"><label class="form-label">Kategori</label>
                                            <select name="id_kategori" class="form-select">
                                                <?php foreach($kategori as $kat) { ?>
                                                <option <?php if($kat['id_kategori']==$aa['id_kategori']){ echo"selected"; } ?> value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                                <?php } ?>
                                            </select></div>
                                        <div class="mb-3"><label class="form-label">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="5"><?= $aa['keterangan'] ?></textarea></div>
                                        <div class="mb-3"><label class="form-label">Ganti Foto (Kosongkan jika tidak)</label>
                                            <input type="file" name="foto" class="form-control" accept="image/*"></div>
                                    </div>
                                    <div class="modal-footer"><button type="submit" class="btn btn-primary">Update</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahKonten" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Input Konten</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Judul</label><input type="text" class="form-control" name="judul" required></div>
                    <div class="mb-3"><label class="form-label">Kategori</label>
                        <select name="id_kategori" class="form-select">
                            <?php foreach($kategori as $kat) { ?><option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option><?php } ?>
                        </select></div>
                    <div class="mb-3"><label class="form-label">Keterangan</label><textarea name="keterangan" class="form-control" rows="5" required></textarea></div>
                    <div class="mb-3"><label class="form-label">Foto</label><input type="file" name="foto" class="form-control" accept="image/*" required></div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary">Simpan</button></div>
            </form>
        </div>
    </div>
</div>