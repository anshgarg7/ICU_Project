<?php
include 'fxn.php';
if (isset($_POST["Country"])) {
  $temp_cid = $_POST["Country"];
  $result = getThis("SELECT `id`, `name` FROM `states` WHERE `country_id`=$temp_cid ORDER BY `name` ASC");
  echo json_encode($result);
}
if (isset($_POST["State"])) {
  $temp_sid = $_POST["State"];
  $result = getThis("SELECT `id`, `name` FROM `cities` WHERE `state_id`=$temp_sid ORDER BY `name` ASC");
  echo json_encode($result);
}

if (isset($_POST["City"])) {
  $temp_cid = $_POST["City"];
  $result = getThis("SELECT `id`, `hospitalName` FROM `hospitals` WHERE `cityID`=$temp_cid ");
  for ($i = 0; $i < sizeof($result); $i++)
    $result[$i]['hospitalName'] = e_d('d', $result[$i]['hospitalName']);
  echo json_encode($result);
}

if (isset($_POST["hospital"])) {
  $temp_hid = $_POST["hospital"];
  $result = getThis("SELECT doctors.`id` as doctorID, `fullName` , `departmentID`  ,`qualificationID` ,departments.`departmentName`, qualifications.`qualificationName` FROM `doctors`,`departments`,`qualifications` WHERE doctors.`hospitalID`=$temp_hid AND departments.`id` = doctors.`departmentID` AND qualifications.`id` = doctors.`qualificationID` ORDER BY doctors.`departmentID` ASC ");
  // $result = getThis("SELECT `id`, `fullName` from `doctors` where `hospitalID` = '$temp_hid'");
  for ($i = 0; $i < sizeof($result); $i++) {
    $result[$i]['fullName'] = e_d('d', $result[$i]['fullName']);
  }
  echo json_encode($result);
}







if (isset($_POST["department"])) {
  $temp_did = $_POST["department"];
  $hid = $_SESSION["hospitalId"];
  $result = getThis("SELECT `id`, `fullName` FROM `doctors` WHERE `hospitalID`=$hid AND `departmentID` = '$temp_did' ");
  for ($i = 0; $i < sizeof($result); $i++) {
    $result[$i]['fullName'] = e_d('d', $result[$i]['fullName']);
  }
  echo json_encode($result);
}
