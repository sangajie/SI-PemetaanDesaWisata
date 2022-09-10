<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'head.php'?>
</head>
<body>
    <div id="app" class="bg-white">
        <!-- Bagian Sidebar -->
        <?php include 'sidebarUser.php'?>
        
        <?= $this->renderSection('content') ?>
        
        <?php include 'footer.php'?>
    </div>
</div>

<?php include 'javascript.php' ?>
<?= $this->renderSection('javascript') ?>
</body>
</html>