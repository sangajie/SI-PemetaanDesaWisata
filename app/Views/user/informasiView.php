<?= $this->extend('__Layout/UserIndexView') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="position-relative d-flex justify-content-center col-12">
        <div class="position-absolute col-10" style="height:300px;background:#134e6f;background:url('/dist/assets/images/bg/pexels-nick-wehrli-3762284.jpg');background-position:center;background-size:cover"></div>
        <div class="position-relative col-10 d-flex flex-column justify-content-center align-items-center" style="height:300px;background:#134e6f;opacity:.5">
            <h3 class="text-white">Wisata Desa Cimacan</h3>
            <h1 class="text-white"><?= $map['namaLokasi']?></h1>
        </div>
    </div>
    <div class="position-relative d-flex justify-content-center col-12 pt-5 bg">
        <div class="col-10" style="">
            <div>
                <h3>Keterangan</h3>
                <?= $map['keterangan']?>
            </div>
            <hr>
            <div>
                <h3>Buka</h3>
                <p>08.00 - 16.00 WIB</p>
            </div>
            <hr>
            <div>
                <h3>HTM</h3>
                <p>Tiket Masuk Masyarakat Umum</p>
                <li>Rp24.000</li><hr>
                <p>Tiket Masuk Pelajar</p>
                <li>Rp24.000</li><hr>
                <p>Tiket Masuk Mancanegara </p>
                <li>Rp24.000</li><hr>
            </div>
            <div class="d-flex justify-content-end pb-5 ">
                <a class="btn btn-primary" href="<?= base_url("user")?>">Kembali</a>
            </div>
            <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div> -->
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?=site_url($url.'/informasi/')?><?= $map['mapId']?>" name="myForm" id="myForm" method="POST" >
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                                <?= input_hidden('LokasiAwal','LokasiAwal', $Rute['LokasiAwal'] ?? '','','required') ?>
                                            </div>
                                        </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <a type="submit" class="btn btn-success me-1 mb-1" id="tis" onclick="tesi()">Tentukan Rute</a>
                                        <a type="submit" class="btn btn-primary me-1 mb-1" id="tis" onclick="lokasiawal()">Tentukan Lokasi Saya</a>
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
        </div>
    </div>
</section>
<!--  -->
<!--  -->
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
           function lokasiawal(){
           navigator.geolocation.getCurrentPosition(showPosition);
        }
        function showPosition(position) {
               x.value =  position.coords.latitude + "," + position.coords.longitude;
               document.getElementById("myForm").submit();
               
               // 
            }
            
let latLng1 = L.latLng(<?= $Rute['LokasiAwal'] ?>);
let latLng2 = L.latLng(<?= $map['latLng']?>);
let wp1 = new L.Routing.Waypoint(latLng1);
let wp2 = new L.Routing.Waypoint(latLng2);
function tesi(){
    let x = document.forms["myForm"]["LokasiAwal"].value;
    if (x == "") {
        alert("Klik Tentukan Lokasi Saya");
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
        // 
        // L.Routing.control({
        //     waypoints: [
        //         L.latLng(-6.768261387680106,106.97770751522123),
        //         L.latLng(-6.7338262197252,106.98799682511712)
        //     ],
        //     routeWhileDragging: true
        // }).addTo(mymap);
        L.marker([<?= $map['latLng']?>]).addTo(mymap)
       </script>
    <?= $this->endSection() ?>  