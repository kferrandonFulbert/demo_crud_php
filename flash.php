<?php
if (isset($_SESSION["FLASH"])) {
    ?>   
    <div class="row">
        <p class="alert alert-<?=$_SESSION["FLASH"]["type"]?>">
            <?php
            $msg = $_SESSION["FLASH"]["message"];
            echo $msg;
            ?>
        </p>
    </div>
    <?php
    unset($_SESSION["FLASH"]);
}
?>