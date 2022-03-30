<?php 
session_start();
 include "head.php";
?>
<body>
<!-- Content -->
<div class="container">
<?php include "menu.php" ?>
  <h1><?php echo $page; ?></h1>
  <?php  include 'flash.php'; ?>
  <!-- On charge la page voulue -->
    <?php include $pages[$page]; ?> 
</div>
<!-- footer -->
<?php include "footer.php";?>
</body>
</html>