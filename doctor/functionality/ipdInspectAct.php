<?php
include "../../assets/fxn.php";
$doctId = $_SESSION["UID"];
$hospitalId = $_SESSION["hospitalID"];
doThis("UPDATE `doctors` SET `currentActivity` = '2' WHERE `id` = '$doctId'");
// $token = $_SESSION['token'];
// doThis("UPDATE `doctoken` SET `lastLogoutAt`=CURRENT_TIMESTAMP(),`enabled`='0' WHERE `token`='$token'");
doThis("INSERT INTO `doctoractivity`(`doctorId`, `hospitalId`,`currentActivity`, `generatedAt`)
VALUES ('$doctId','$hospitalId','2',CURRENT_TIMESTAMP())");
session_destroy();
?>
<script>
    window.location = "../index.php";
</script>
