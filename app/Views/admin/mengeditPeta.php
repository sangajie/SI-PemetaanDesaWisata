<?= $this->extend('__Layout/adminIndexView') ?>
<?= $this->section('content') ?>
<?php
    if($getData!=null)
    {
        extract($getData);
    }
    if($getDataKategori!=null)
    {
        extract($getDataKategori);
    }
?>
		<section class="section">
			<div class="card flex-md-row flex-column">
				<!-- Form -->
				<div class="col-md-5 col-12" style="transition: 1s;">
					<div class="card">
						<div class="card-header pb-0">
							<h4 class="card-title">Mengubah Data Peta</h4>
						</div>
						<div class="card-content ">
							<div class="card-body">
								<form action="<?=site_url($url.'/save')?>" method="POST" class="form form-vertical" id="formData">
									<?= input_hidden('mapId', $mapId ?? '') ?>	
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group has-icon-left">
													<label for="first-name-icon">Garis Lintang dan Garis Bujur</label>
													<div class="position-relative">
														<?= input_text('Harap click kordinat pada peta','latLng','latLng', $latLng ?? '','','required') ?>	
														<div class="form-control-icon">
															<i class="bi bi-geo-alt-fill"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group has-icon-left">
													<label for="mobile-id-icon">Nama Lokasi</label>
													<div class="position-relative">
														<?= input_text('Harap isi nama lokasi','namaLokasi','namaLokasi', $namaLokasi ?? '','','required' ) ?>	
														<div class="form-control-icon">
															<i class="bi bi-shop-window"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group has-icon-left">
													<label for="password-id-icon">Kategori</label>
													<div class="position-relative">
															<?php
															$op['']='Pilih Kategori';
															// $get=$this->KecamatanModel->get();
															foreach ($kategori as $row) {
																$op[$row->kategoriNama]=$row->kategoriNama;
															}
															?>
															<?=select('kategoriNama',$op,$kategoriNama ?? '','','required')?>
														<div class="form-control-icon">
															<i class="bi bi-shop-window"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group has-icon-left">
													<label for="mobile-id-icon">Keterangan</label>
													<div class="position-relative">
														<?= input_text('Harap isi keterangan','keterangan','keterangan', $keterangan ?? '','','required') ?>	
														<div class="form-control-icon">
															<div class="icon dripicons dripicons-information"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Form -->
				<div id="map" class="col-md-7 col-12" style="height:500px;z-index:0	"></div></div>
			</div>
		</section>
	<?= $this->section('javascript') ?>
	<script>
		var pristine;
		window.onload = function () {
			
			var form = document.getElementById("formData");
			
			pristine = new Pristine(form);
			
			form.addEventListener('submit', function (e) {
				var valid = pristine.validate();
				if(!valid){
					e.preventDefault();

				}
				
			});
			
			
		};
		


		// buat variabel berisi fugnsi L.popup 
		var popup = L.popup();
		
		// buat fungsi popup saat map diklik
		function onMapClick(e) {
			var coord = e.latlng;
			var lat = coord.lat;
			var lng = coord.lng;
			popup
			.setLatLng(e.latlng)
			.setContent( "<div><p class='text-center'>Koordinat</p>"+lat +"," + lng +"<div class=''></div></div>"
			) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
			.openOn(mymap);
			// document.getElementsByName
			document.getElementById('latLng').value = lat + "," + lng //value pada form latitde, longitude akan berganti secara otomatis
		}
		mymap.on('click', onMapClick); //jalankan fungsi

		<?php
        
        $mysqli = mysqli_connect('localhost', 'root', 'raissa22', 'webgisci4');   //koneksi ke database
        $tampil = mysqli_query($mysqli, "select * from map"); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){ ?> //melooping data menggunakan while

        //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
        //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
        L.marker([<?php echo $hasil['latLng']; ?>]).addTo(mymap)

                //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
    	.bindPopup(
		'<div class="card">'+
			'<div class="card-content">'+
                '<div class="card-body pb-0">'+
                    '<h4 class="card-title text-center"><?php echo $hasil['namaLokasi']; ?></h4>'+
                    // '<p class="card-text"></p>'+
                    '<div class="col-12">'+
                        '<div class="form-group has-icon-left">'+
                            // '<label for="first-name-icon">Nama Lokasi</label>'+
                            '<div class="position-relative">'+
                                '<p class="card-text text-center"><?php echo $hasil['kategoriNama']; ?></p>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="buttons">'+
				'<a class="btn btn-outline-primary me-2" href="<?= site_url($url . '/form/' . $hasil['mapId']) ?>">Ubah Data</a>'+
				'<a class="btn btn-outline-danger me-2" href="<?= site_url($url . '/delete/' . $hasil['mapId']) ?>">Hapus Data</a>'+
            '</div>'+
        '</div>')
        <?php } ?>
		</script>
	<?= $this->endSection() ?>
	
	<?= $this->endSection() ?>