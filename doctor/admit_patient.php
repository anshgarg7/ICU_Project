<?php
include "../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
    <script type="text/javascript">
        window.location = 'logout.php';
    </script>
<?php
}
$id = $_SESSION["UID"];
$name = e_d('d', $_SESSION["fullName"]);
$email = e_d('d', $_SESSION["emailAddress"]);
$phone = e_d('d', $_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];
$pid = $_SESSION["patientIDforDoctor"];
$token = $_SESSION['patienttoken'];
$patientID = e_d('d', $_SESSION["patientIDforDoctor"]);
$details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`,`previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$patientID'");
$details = $details[0];
$selectedData = getThis("SELECT `prescriptionView`, `laboratoryReportsView` FROM `patienttoken` WHERE `token`='$token'");
$selectedData = $selectedData[0];
$prescriptionSelected = e_d('d', $selectedData['prescriptionView']);
$prescriptionSelected = unserialize($prescriptionSelected);
$reportsSelected = e_d('d', $selectedData['laboratoryReportsView']);
$reportsSelected = unserialize($reportsSelected);
$previousprescriptions = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `patientID`='$patientID' AND `doctorID`='$id' ORDER BY `generatedAt` DESC");
$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];

include "patient_dash_common.php";
?>

<!-- form area starts -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div><?php echo $name; ?>'s Dashboard
                        <div class="page-title-subheading">Welcome to Your DashBoard!!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="functionality/book_room.php" method="post">
            <div class="wrap-input100">
                <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
                            <h5>Room</h5>
                        </span></label><select class="form-control" name="room" id="room_c" required>
                        <option selected disabled>Select Room For Patient</option>
                        <?php $rooms = getThis("SELECT `id`, `roomName`,`roomDescription` FROM `rooms` WHERE `hospitalId` = '$hospitalID'") ?>
                        <?php foreach ($rooms as $k => $c) { ?>
                            <option value="<?php echo $c['id']; ?>"><?php echo e_d('d', $c['roomName']) . "-> " . e_d('d', $c['roomDescription']); ?></option>
                        <?php } ?>
                    </select></div>
                <div class="wrap-input100">
                    <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">
                                <h5>Bed For the Patient</h5>
                            </span></label><select class="form-control" name="bed" id="bed_c" required>
                            <option disabled selected>Select Room First</option>
                        </select></div>
                </div>
                <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Book</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $("#room_c").change(function() {
            var roomID = $("#room_c").val();
            $.ajax({
                url: '../assets/worldData.php',
                method: 'post',
                data: 'room=' + roomID
            }).done(function(rooms) {
                beds = JSON.parse(rooms);
                $('#bed_c').empty();
                $('#bed_c').append('<option disabled selected>Select bed</option>');
                beds.forEach(function(bed) {
                    $('#bed_c').append('<option value=' + bed.id + '>' + bed.bedNumber + '--' + bed.bedUsability + '--' + bed.equipmentAvailable + '</option>');
                })
                $('#bed_c').append('<option value=0>My option is not listed</option>');
            })
        });
    })
</script>
