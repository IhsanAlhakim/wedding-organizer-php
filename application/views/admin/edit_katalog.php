<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Manajemen Katalog</h3>
                    <h6 class="font-weight-normal mb-0">JeWePe Wedding Organizer</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Katalog</h4>
                    <form action="<?= base_url('admin/Katalog/updateData'); ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" value="<?= $katalog->catalogue_id; ?>" name="id">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="inputName">Nama Paket</label>
                                    <input type="text" class="form-control" id="inputName" name="package_name"
                                        placeholder="Nama Paket" required value="<?= $katalog->package_name; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="editor-container">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" name="description" id="editor"
                                            rows="4"><?= $katalog->description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Gambar Header</label>
                                    <input type="file" name="image" class="form-control" <?= empty($katalog->image) ? 'required' : '' ?>>
                                </div>
                                <div class="form-group">
                                    <img src="<?= base_url('assets/files/katalog/') . $katalog->image; ?>"
                                        class="img-thumbnail" style="max-width: 120px;" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga (Rp)</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Harga"
                                        required value="<?= $katalog->price; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="selectPublishStatus">Status Publish</label>
                                    <select name="publish_status" id="selectPublishStatus">
                                        <option value="Y" <?= $katalog->publish_status == 'Y' ? 'selected' : ''; ?>>Publish
                                        </option>
                                        <option value="N" <?= $katalog->publish_status == 'N' ? 'selected' : ''; ?>>Draft
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 text-right">
                                <a href="<?= base_url('admin/Katalog') ?>" class="btn btn-secondary mr-2">Kembali</a>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>