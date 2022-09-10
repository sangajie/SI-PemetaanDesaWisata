<script src="/dist/assets/js/app.js"></script>
<script src="/dist/assets/js/map/baseMap.js"></script>
<!-- Image Upload -->
<script src="/dist/assets/js/extensions/filepond.js"></script>
<!-- Routing Machine -->
<!-- <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script> -->
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="https://combinatronics.com/Sha256/Pristine/master/dist/pristine.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="dist/assets/js/pages/horizontal-layout.js"></script>
<script>
<?php
    if (session()->getFlashdata('info')) 
    {
        ?>
         Swal.fire({
            icon: '<?= session()->getFlashdata('info') ?>',
            title: '<?= session()->getFlashdata('message') ?>',
        })

        <?php
    }
?>

</script>