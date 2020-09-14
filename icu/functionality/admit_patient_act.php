<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
 	?>
 	<script type="text/javascript">
 		window.location='logout.php';
 	</script>
	<?php
}
$hospitalID = $_POST['hospitalID'];
$roomID = $_POST['roomID'];
$patientName = e_d('e',$_POST['patientName']);
$phoneNumber = e_d('e',$_POST['phoneNumber']);
$emailAddress = e_d('e',$_POST['emailAddress']);
$addressLine1 = e_d('e',$_POST['addressLine1']);
$cityID = $_POST['cityID'];
$stateID = $_POST['stateID'];
$countryID = $_POST['countryID'];
$patientName = e_d('e',$_POST['patientName']);
$patientName = e_d('e',$_POST['patientName']);
$symptomsdata = serialize($symptomsdata);
$symptomsdata = e_d('e',$symptomsdata);
$previousMed = $_POST['previousMed'];
$previousMed = serialize($previousMed);
$previousMed = e_d('e',$previousMed);
$previousDiseases = $_POST['previousDiseases'];
$previousDiseases = serialize($previousDiseases);
$previousDiseases = e_d('e',$previousDiseases);
$allergies = $_POST['allergies'];
$allergies = serialize($allergies);
$allergies = e_d('e',$allergies);
$familyHistory = e_d('e',$_POST['familyHistory']);
$foodHabits = $_POST['foodHabits'];
$foodHabits = serialize($foodHabits);
$foodHabits = e_d('e',$foodHabits);
$flag = $_POST['flag'];
 if(isset($_POST['submit']))
 {
   if($flag == '1'){
     $prescriptionID = doThis("INSERT INTO `patients`(`fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `previousMedication`, `ipdToken`, `previousDiseases`, `familyHistory`, `allergicReactions`, `foodHabits`, `insuranceDetails`, `lastLogin`, `createdAt`, `enabled`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20]))");
   }else {
     $prescriptionID = doThis("INSERT INTO `patients`(`fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `previousMedication`, `ipdToken`, `previousDiseases`, `familyHistory`, `allergicReactions`, `foodHabits`, `insuranceDetails`, `lastLogin`, `createdAt`, `enabled`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20]))");
   }
     ?>
     <script>
         alert("Patient Registered Successfully!!");
         window.location = "../newprescription.php";
 </script>
<?php
 }
?>
