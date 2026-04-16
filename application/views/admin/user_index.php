<div id="ngilang">
    <?= $this->session->flashdata('alert'); ?>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">Data Pengguna</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">
            <i class="bi bi-plus-lg"></i> Tambah User
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($user as $aa) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $aa['username']; ?></td>
                    <td><?= $aa['nama']; ?></td>
                    <td><?= $aa['level']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/user/delete/'.$aa['id_user']) ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i>
                        </a>
                        
                        <button type="button" class="btn btn-sm btn-warning" 
                                data-bs-toggle="modal" data-bs-target="#edit<?= $aa['id_user'] ?>">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="edit<?= $aa['id_user'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Perbarui Nama: <?= $aa['nama'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('admin/user/update') ?>" method="post">
                                <input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $aa['nama'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" value="<?= $aa['username'] ?>" readonly>
                                        <small class="text-muted">Username tidak bisa diubah.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <select name="level" class="form-select">
                                            <option value="Admin" <?= ($aa['level']=='Admin') ? 'selected' : '' ?>>Admin</option>
                                            <option value="Kontributor" <?= ($aa['level']=='Kontributor') ? 'selected' : '' ?>>Kontributor</option>
                                        </select>
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

<div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/user/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select name="level" class="form-select">
                            <option value="Admin">Admin</option>
                            <option value="Kontributor">Kontributor</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>