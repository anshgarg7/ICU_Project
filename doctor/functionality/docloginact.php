<?php
include "../../assets/fxn.php";
$user = e_d('e', $_POST["username"]);
$pass = e_d('e', $_POST["password"]);
$login = getThis("SELECT `id`, `hospitalId`, `departmentID`, `qualificationID`, `fullName`, `phoneNumber`, `emailAddress`, `dob`, `addressLine1`, `cityID`, `stateID`, `countryID`, `lastLogin`, `createdAt` FROM `doctors` WHERE `username`='$user' AND `password`='$pass' AND `enabled`='1'");
if ($login) {
	$login = $login[0];
	if ($login["id"] != null) {
		$id = $login["id"];
		$_SESSION["UID"] = $login["id"];
		$_SESSION["hospitalId"] = $login["hospitalId"];
		$_SESSION["departmentID"] = $login["departmentID"];
		$_SESSION["qualificationID"] = $login["qualificationID"];
		$_SESSION["fullName"] = $login["fullName"];
		$_SESSION["phoneNumber"] = $login["phoneNumber"];
		$_SESSION["emailAddress"] = $login["emailAddress"];
		doThis("UPDATE `doctors` SET `lastLogin` = CURRENT_TIMESTAMP() WHERE `id`='$id'");
		
		//roomID absent in doctors table
		$roomDetails = getThis("SELECT `id`, `hospitalId`, `roomName`, `roomDescription`, `roomLocation`, `roomUsername`, `roomPassword`, `totalBeds`, `generatedAt`, `enabled` FROM `rooms` WHERE `id`=$roomID AND `enabled`='1'");
		$roomDetails = $roomDetails[0];
		if ($roomDetails["id"] != null) {
			$id = $roomDetails["id"];
			$_SESSION["UID"] = $roomDetails["id"];
			$_SESSION["roomName"] = $roomDetails["roomName"];
			$_SESSION["roomDescription"] = $roomDetails["roomDescription"];
			$_SESSION["roomLocation"] = $roomDetails["roomLocation"];
			$_SESSION["totalBeds"] = $roomDetails["totalBeds"];
		}
?>
		<script type="text/javascript">
			window.location = '../dashboard.php';
		</script>
	<?php
	}
} else {
	?>
	<script type="text/javascript">
		alert("Login Failed ! Please try again !!");
		window.location = '../../index.php';
	</script>
<?php
}
?>