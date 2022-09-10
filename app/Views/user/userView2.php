<?= $this->extend('__Layout/userIndexView') ?>

<?= $this->section('content') ?>

<section class="section">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div> -->
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?=site_url($url.'/route')?>" name="myForm" id="myForm" method="POST" >
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Lokasi Awal</label>
                                                <?= input_text('Harap click kordinat pada peta','LokasiAwal','LokasiAwal', $Rute['LokasiAwal'] ?? '','','required') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Lokasi Tujuan</label>
                                            <input type="text" class="form-control"
                                            placeholder="Lokasi Tujuan" id="tujuan" name="LokasiTujuan" value="<?= $Rute['LokasiTujuan'] ?>">
                                            <!-- <p id="lokasi"></p> -->
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a type="submit" class="btn btn-primary me-1 mb-1" id="tis" onclick="tesi()">Tentukan Rute</a>
                                        <!-- <button type="submit" class="btn btn-primary me-1 mb-1">load</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="card">
        <div id="map" style="height:500px;z-index:0"></div></div>
    </div>
</section>
        <!-- lokasi yang didapatkan akan dicetak di dalam elemen p -->
        <?= $this->endSection() ?>
        <?= $this->section('javascript') ?>
       <script>
        var pristine;
		window.onload = function () {
			
			var form = document.getElementById("myForm");
			
			pristine = new Pristine(form);
			
			form.addEventListener('submit', function (e) {
				var valid = pristine.validate();
				if(!valid){
					e.preventDefault();

				}
				
			});
			
			
		};
           var lokasi = document.getElementById("lokasi");
           var x = document.getElementById("LokasiAwal");
           navigator.geolocation.getCurrentPosition(showPosition);

function showPosition(position) {
  x.value =  position.coords.latitude + "," + position.coords.longitude;
}

        //    function getlokasi() {
               //jika browser mendukung navigator.geolocation maka akan menjalankan perintah di bawahnya
            //    if (navigator.geolocation) {
                   // getCurrentPosition digunakan untuk mendapatkan lokasi pengguna
                   //showPosition adalah fungsi yang akan dijalankan
            //        navigator.geolocation.getCurrentPosition(showPosition);    
            // //     }
            // // }
            
            // function showPosition(posisi){
            //     // tampilkan kordinat di dalam elemen lokasi
            //     document.getElementById("LokasiAwal").value = posisi.coords.latitude +","+ posisi.coords.longitude;
            // }


            // let map = L.map('map').setView([-3.795529316237563, 114.784255027771], 13);
            let latLng1 = L.latLng(<?= $Rute['LokasiAwal'] ?>);
            let latLng2 = L.latLng(<?= $Rute['LokasiTujuan'] ?>);
            let wp1 = new L.Routing.Waypoint(latLng1);
            let wp2 = new L.Routing.Waypoint(latLng2);
            // 
            function tesi(){
                let x = document.forms["myForm"]["LokasiTujuan"].value;
                if (x == "") {
    alert("Tentukan Lokasi Tujuan");
    return false;
  } else {
                console.time('Execution Time');
                L.Routing.control({
                    lineOptions: {styles: [{color: '#242c81', weight: 2}]},
                    fitSelectedRoutes: true,
                    draggableWaypoints: false,
                    routeWhileDragging: false,
                    // createMarker: function() { return null; },
                    waypoints: [latLng1,latLng2]
                }).addTo(mymap);
                let routeUs = L.Routing.osrmv1();
                routeUs.route([wp1,wp2],(err,routes)=>{
                    if(!err)
                    {
                        let best = 100000000000000;
                        let bestRoute = 0;
                        for(i in routes)
                        {
                            if(routes[i].summary.totalDistance < best) {
                                bestRoute = i;
                                best = routes[i].summary.totalDistance;
                            }
                        }
                        console.log('best route',routes[bestRoute]);
            L.Routing.line(routes[bestRoute],{
                styles : [
                    {
                        color : 'green',
                        weight : '10'
                    }
                ]
            }).addTo(mymap);
            
        }
        
    })
    console.timeEnd('Execution Time');
}
}
    // 
        // L.Routing.control({
        //     waypoints: [
        //         L.latLng(-6.768261387680106,106.97770751522123),
        //         L.latLng(-6.7338262197252,106.98799682511712)
        //     ],
        //     routeWhileDragging: true
        // }).addTo(mymap);

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
                    '<div class="card-footer d-flex justify-content-between p-2">'+
                    '<a  class="btn btn-outline-primary me-2" href="<?= site_url($url . '/informasi/' . $hasil['mapId']) ?>">Informasi</a>'+
                    '<a class="btn btn-outline-success me-2" href="#" name="lokasi" id="<?= $hasil['latLng']; ?>" onclick="tos(this.id)">Kunjungi</a>'+
                    '</div>'+
                    '</div>'
                    )
                    function tos(lokasi) {
                        document.getElementById("tujuan").value = lokasi;
                        document.getElementById("myForm").submit();
                        // return 
                        
                    }
                
                <?php } ?>

       </script>
    <?= $this->endSection() ?>  