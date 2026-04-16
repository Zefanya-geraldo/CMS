<div id="ngilang">
    <?= $this->session->flashdata('alert'); ?>
</div>

<form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Konfigurasi Website</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Judul Website</label>
                        <input type="text" class="form-control" name="judul" value="<?= $konfig->judul_website; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Profile Website</label>
                        <textarea class="form-control" name="profil_website" rows="3"><?= $konfig->profil_website; ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="<?= $konfig->facebook; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="<?= $konfig->instagram; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $konfig->email; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $konfig->alamat; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor WhatsApp (Contoh: 62812345678)</label>
                        <input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa; ?>">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update Konfigurasi</button>
            </div>
        </div>
    </div>
</form>