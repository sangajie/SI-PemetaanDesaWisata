<?= $this->extend('__Layout/UserIndexView') ?>

<?= $this->section('content') ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">INFORMASI</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Nama Tempat</label>
                                    <div class="position-relative">
                                        <h5 class="border-bottom border-dark p-2">  </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Kategori</label>
                                    <div class="position-relative">
                                        <h5 class="border-bottom border-dark p-2"><?= $map['kategoriNama']?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Keterangan</label>
                                    <div class="position-relative">
                                        <h5 class="border-bottom border-dark p-2"><?= $map['keterangan']?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <!-- <a href="" class="btn btn-outline-success me-1 mb-1">KUNJUNGI</a> -->
                                <a href="<?= site_url($url) ?>" class="btn btn-outline-secondary me-1 mb-1">KEMBALI</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
                                <!--  -->