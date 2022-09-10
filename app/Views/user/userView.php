<?= $this->extend('__Layout/userIndexView') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="position-relative justify-content-center col-12">
        <div class="position-absolute" style="height:300px;background:#134e6f;width:100%;background:url('dist/assets/images/bg/pexels-nick-wehrli-3762284.jpg');background-position:center;background-size:cover"></div>
        <div class="position-relative d-flex flex-column justify-content-center align-items-center" style="height:300px;background:#134e6f;width:100%;opacity:.5">
            <h1 class="text-white">Sistem Informasi </h1>
            <h1 class="text-white">Pariwisata Desa Cimacan</h1>
        </div>
    </div>
</section>
<section class="section m-4">
    <div class="row p-5">
        
        <?php 
        $no = 1;
        foreach ($map as $item): ?>
            <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="dist/assets/images/samples/origami.jpg" alt="Card image cap"
                    style="height: 20rem" />
                    <div class="card-body">
                        <h4 class="card-title"><?= $item['namaLokasi'] ?></h4>
                        <p class="card-text"><?= $item['keterangan'] ?></p>
                        <a  class="btn btn-outline-primary me-2" href="<?= site_url($url . '/informasi/' . $item['mapId']) ?>">Informasi</a>
                        <!-- <button class="btn btn-success block">Rute</button> -->
                    </div>
                </div>
            </div>
        </div>
        
        <?php endforeach ?>
            <!-- <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Bottom Image Cap</h4>
                            <p class="card-text">
                                Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate
                                bar
                                chocolate tart dragée.
                            </p>
                            <p class="card-text">
                                Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
                                muffin.
                            </p>
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                        <img class="card-img-bottom img-fluid" src="dist/assets/images/samples/water.jpg"
                        alt="Card image cap" style="height: 20rem; object-fit: cover;">
                    </div>
                </div>
            </div> -->
    </div>
</section>
<!--  -->
<!--  -->
<?= $this->endSection() ?>  
<!--  -->
    <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="dist/assets/images/bg/pexels-nick-wehrli-3762284.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
    </div> -->