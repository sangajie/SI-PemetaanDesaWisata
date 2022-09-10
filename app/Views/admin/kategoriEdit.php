<?= $this->extend('__Layout/adminIndexView') ?>
<?= $this->section('content') ?>

<?php
    if($getData!=null)
    {
        extract($getData);
    }
?>
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kategori</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?=site_url($url.'/saveKategori')?>" class="form form-vertical"  method="POST" id="Kategori">
                            <?= input_hidden('kategoriId', $kategoriId ?? '') ?>		
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Nama Kategori</label>
                                                <div class="position-relative">
                                                    <?= input_text('Harap isi nama Kategori','kategoriNama','kategoriNama', $kategoriNama ?? '','','required') ?>	
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
        
    <?= $this->section('javascript') ?>
        <script>
            var pristine;
            window.onload = function () {
                
                var form = document.getElementById("Kategori");
                
                pristine = new Pristine(form);
                
                form.addEventListener('submit', function (e) {
                    var valid = pristine.validate();
                    if(!valid){
                        e.preventDefault();
                        
                    }
                    
                });
                
                
            };
            </script>   
            <?= $this->endSection() ?>
            <?= $this->endSection() ?>  