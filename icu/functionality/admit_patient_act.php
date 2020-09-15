<?php
include "../../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
  <script type="text/javascript">
    window.location = 'logout.php';
  </script>
<?php
}
$hospitalID = $_POST['hospitalID'];
$roomID = $_SESSION["UID"];
$patientName = e_d('e', $_POST['patientName']);
$phoneNumber = e_d('e', $_POST['phoneNumber']);
$emailAddress = e_d('e', $_POST['emailAddress']);
$addressLine1 = e_d('e', $_POST['addressLine1']);
$cityID = $_POST['city'];
$stateID = $_POST['state'];
$countryID = $_POST['country'];
$patientName = e_d('e', $_POST['patientName']);
$patientName = e_d('e', $_POST['patientName']);
// $symptomsdata = serialize($symptomsdata);
// $symptomsdata = e_d('e', $symptomsdata);
$previousMed = $_POST['previousMedication'];
$previousMed = serialize($previousMed);
$previousMed = e_d('e', $previousMed);
$previousDiseases = $_POST['previousDiseases'];
$previousDiseases = serialize($previousDiseases);
$previousDiseases = e_d('e', $previousDiseases);
$allergies = $_POST['allergicReactions'];
$allergies = serialize($allergies);
$allergies = e_d('e', $allergies);
$familyHistory = e_d('e', $_POST['familyHistory']);
$foodHabits = $_POST['foodHabits'];
$foodHabits = serialize($foodHabits);
$foodHabits = e_d('e', $foodHabits);
$flag = $_POST['flag'];
$prescriptionID = NULL;
$patientID = NULL;
if (isset($_POST['submit'])) {
  if ($flag == 1) {
    $patientID = getThis("SELECT `id` FROM `patients` WHERE `emailAddress`='$emailAddress' ");
    $patientID = $patientID[0]["id"];
    $res = doThis("UPDATE `patients` SET `fullName`= '$patientName',`phoneNumber`= '$phoneNumber',`emailAddress`= '$emailAddress',`addressLine1`= '$addressLine1',`cityID`='$cityID',`stateID`= '$stateID',`countryID`= '$countryID',`username`= '$emailAddress',`password`= '$phoneNumber',`previousMedication`= '$previousMed',`previousDiseases`= '$previousDiseases',`familyHistory`= '$familyHistory',`allergicReactions`= '$allergies',`foodHabits`= '$foodHabits',`lastLogin`= CURRENT_TIMESTAMP() WHERE `id`='$patientID'");
    echo $patientID;
  } else {
    $patientID = doThis("INSERT INTO `patients`(`fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `previousMedication`, `previousDiseases`, `familyHistory`, `allergicReactions`, `foodHabits`, `createdAt`)
     VALUES ('$patientName','$phoneNumber','$emailAddress','$addressLine1','$cityID','$stateID','$countryID','$emailAddress','$phoneNumber','$previousMed','$previousDiseases','$familyHistory','$allergies','$foodHabits',CURRENT_TIMESTAMP() )");
  }
?>
  <script>
    alert("Patient Registered Successfully!!");
    // window.location = "../newprescription.php";
  </script>
<?php
}
?>