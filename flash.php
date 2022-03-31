<?php
/**
 * Utilisation des messages flash.
 *  $_SESSION['FLASH']["message"] = "Message à afficher";
    $_SESSION['FLASH']["type"] = "success|danger|warning|..."; cf doc bootstrap
 */
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