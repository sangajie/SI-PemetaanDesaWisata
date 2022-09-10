<?= $this->extend('__Layout/adminIndexView') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Login</h4>
                </div>
                <div class="ps-4 pe-4 d-flex justify-content-end">
                    <a href="/admin/dataLoginEdit" class="btn btn-outline-primary">Tambah Data</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- table head dark -->
                            <table class="table table-borderless mb-0">
                                <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th colspan="2" >Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            $no = 1;
                                            foreach ($login as $item): ?>
                                            <tr>
                                                <td class="text-bold-500"><?= $no++ ?></td>
                                                <td><?= $item['username'] ?></td>
                                                <td><?= $item['password'] ?></td>
                                                <td><a href="/admin/kategoriEdit/<?= $item['kategoriId'] ?>"><div class="icon dripicons dripicons-document-edit"></div></a></td>
                                                <td><a href="/admin/deleteKategori/<?= $item['kategoriId'] ?>"><div class="icon dripicons dripicons-document-delete"></div></a></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
            <?= $this->endSection() ?>  