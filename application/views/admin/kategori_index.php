<div id="ngilang">
    <?= $this->session->flashdata('alert'); ?>
</div>

<div class="card mt-2">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">Kategori Konten</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategori">
            <i class="bi bi-plus-lg"></i> Tambah Kategori
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($kategori as $aa) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $aa['nama_kategori']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/kategori/delete/'.$aa['id_kategori']) ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-warning" 
                                    data-bs-toggle="modal" data-bs-target="#edit<?= $aa['id_kategori'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit<?= $aa['id_kategori'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Perbarui Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('admin/kategori/update') ?>" method="post">
                                    <input type="hidden" name="id_kategori" value="<?= $aa['id_kategori'] ?>">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama_kategori" value="<?= $aa['nama_kategori'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
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

<div class="modal fade" id="tambahKategori" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori Konten</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/kategori/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>