<div id="ngilang">
    <?= $this->session->flashdata('alert'); ?>
</div>

<div class="col-xl-12 shadow">
    <div class="card">
        <form action="<?= base_url('admin/carousel/simpan') ?>" method="post" enctype="multipart/form-data">
            <div class="card-header">
                <h4 class="card-title">Tambah Carousel</h4>
            </div>
            <div class="card-body">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul foto" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Pilih Foto (Ukuran 1:3 atau 1920x600px)</label>
                    <input type="file" name="foto" class="form-control" accept="image/png, image/jpeg" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="row mt-3">
    <?php foreach($carousel as $aa) { ?>
    <div class="col-md-12 mb-3">
        <div class="card shadow">
            <img src="<?= base_url('assets/upload/carousel/'.$aa['foto']) ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $aa['judul']; ?></h5>
                <a href="<?= base_url('admin/carousel/delete_data/'.$aa['foto']) ?>" 
                   class="btn btn-sm btn-danger" 
                   onclick="return confirm('Yakin ingin menghapus?')">
                    <i class="bi bi-trash"></i> Hapus
                </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>