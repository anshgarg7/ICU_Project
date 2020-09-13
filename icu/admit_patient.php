<?php
include "dash_common.php";
$flag = 0;
if (isset($_POST["submitCheck"])) {
  $name = e_d('e', $_POST["patientName"]);
  $phone = e_d('e', $_POST["phoneNumber"]);

  $check = getThis("SELECT * FROM `patients` WHERE `fullName` = '$name' AND `phoneNumber`='$phone'");

  $flag = 0;
  if (sizeof($check) > 0) {
    $flag = 1;
    $check = $check[0];
  }
}

?>



<!-- form area starts -->
<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">

          <div>Admit Patient
            <div class="page-title-subheading"><?php echo $roomDescription; ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Admission Form</h5>
            <form action="admit_patient.php" method="POST">
              <div class="row">

                <div class="col-md-6">
                  <b>Patient Name</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="patientName" placeholder="Enter Patient Name" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <b>Phone Number</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="phoneNumber" placeholder="Enter Patient Phone Number" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submitCheck">Submit</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>








    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Admission Form</h5>
            <form action="functionality/prescription_act.php" method="POST">
              <div class="row">

                <div class="col-md-6">
                  <b>Patient Name</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="patientName" placeholder="Enter Patient Name" class="form-control name_list" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['fullName']); ?> " <?php } ?> /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <b>Phone Number</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="phoneNumber" placeholder="Enter Patient Phone Number" class="form-control name_list" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['phoneNumber']); ?> " <?php } ?> /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <b>Email Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="email" name="emailAddress" placeholder="Enter Patient Email Address" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['emailAddress']); ?> " <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <b>House Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="addressLine1" placeholder="Address Line 1" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['addressLine1']); ?> " <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="col-md-12">
                  <b>Emergency Contact</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="addressLine1" placeholder="Address Line 1" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', "RkVSS0RaN0hiL3ROQjRBSkZYUmFLN3poZmg1dU1pYTMzbkpYQWJMajZHZz0="); ?> " <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- <div class="col-md-4">
                  <b>House Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="email" name="addressLine1" placeholder="Address Line 1" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-4">
                  <b>House Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="email" name="addressLine1" placeholder="Address Line 1" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-4">
                  <b>House Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="email" name="addressLine1" placeholder="Address Line 1" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div> -->
              </div>
              <div class="col-md-12">
                <b>Previous Medication</b>
                <div class="table-responsive">

                  <?php
                  $x = 0;
                  if ($flag == 1) {
                  ?>
                    <table class="table" id="dynamic_field1">
                      <?php
                      $previousMedication = e_d('d', $check['previousMedication']);
                      $previousMedication = unserialize($previousMedication);

                      for (; $x < sizeof($previousMedication); $x++) {
                      ?>
                        <tr id="rowrm1<?php echo $x + 1; ?>">
                          <td><input type="text" name="previousMedication[]" value="<?php echo $previousMedication[$x]; ?>" class="form-control name_list" /></td>
                          <td><button type="button" name="remove" id="rm1<?php echo ($x + 1); ?>" class="btn btn-danger btn_remove">X</button></td>
                        </tr>
                      <?php

                      }
                      ?>
                    </table>
                  <?php
                  }
                  ?>

                  <table class="table " id="dynamic_field1">
                    <tr>
                      <td><input type="text" name="previousMedication[]" placeholder="Enter Previous Medication" class="form-control name_list" /></td>
                      <td><button type="button" name="add1" id="add1" class="mt-2 btn btn-primary">Add More</button></td>
                    </tr>
                  </table>
                </div>
              </div>





              <div class="col-md-12">
                <b>Previous Diseases</b>
                <div class="table-responsive">
                  <?php
                  $y = 0;
                  if ($flag == 1) {
                  ?>
                    <table class="table" id="dynamic_field2">
                      <?php
                      $previousDiseases = e_d('d', $check['previousDiseases']);
                      $previousDiseases = unserialize($previousDiseases);

                      for (; $y < sizeof($previousDiseases); $y++) {
                      ?>
                        <tr id="rowrm2<?php echo $y + 1; ?>">
                          <td><input type="text" name="$previousDiseases[]" value="<?php echo $previousDiseases[$y]; ?>" class="form-control name_list" /></td>
                          <td><button type="button" name="remove" id="rm2<?php echo $y + 1; ?>" class="btn btn-danger btn_remove">X</button></td>
                        </tr>
                      <?php

                      }
                      ?>
                    </table>
                  <?php
                  }
                  ?>
                  <table class="table " id="dynamic_field2">
                    <tr>
                      <td><input type="text" name="previousDiseases[]" placeholder="Enter Previous Major Diseases" class="form-control name_list" /></td>
                      <td><button type="button" name="add2" id="add2" class="mt-2 btn btn-primary">Add More</button></td>
                    </tr>
                  </table>
                </div>
              </div>







              <div class="col-md-12">
                <b>Allergies</b>
                <div class="table-responsive">
                  <?php
                  $z = 0;
                  if ($flag == 1) {
                  ?>
                    <table class="table" id="dynamic_field3">
                      <?php
                      $allergicReactions = e_d('d', $check['allergicReactions']);
                      $allergicReactions = unserialize($allergicReactions);
                      for (; $z < sizeof($allergicReactions); $z++) {
                      ?>
                        <tr id="rowrm3<?php echo $z + 1; ?>">
                          <td><input type="text" name="allergicReactions[]" value="<?php echo $allergicReactions[$z]; ?>" class="form-control name_list" /></td>
                          <td><button type="button" name="remove" id="rm3<?php echo $z + 1; ?>" class="btn btn-danger btn_remove">X</button></td>
                        </tr>
                      <?php

                      }
                      ?>
                    </table>
                  <?php
                  }
                  ?>
                  <table class="table " id="dynamic_field3">
                    <tr>
                      <td><input type="text" name="allergicReactions[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
                      <td><button type="button" name="add3" id="add3" class="mt-2 btn btn-primary">Add More</button></td>
                    </tr>
                  </table>
                </div>
              </div>

              <div class="col-md-12">
                <b>Family History</b>
                <div class="table-responsive">
                  <table class="table " id="dynamic_field">
                    <tr>
                      <td><input type="text" name="addressLine1" placeholder="Family History" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['familyHistory']); ?> " <?php } ?> class="form-control name_list" /></td>
                    </tr>
                  </table>
                </div>
              </div>

              <div class="col-md-12">
                <b>Food Habits</b>
                <div class="table-responsive">

                  <?php
                  $p = 0;
                  if ($flag == 1) {
                  ?>
                    <table class="table ">
                      <?php
                      $foodHabits = e_d('d', $check['foodHabits']);
                      $foodHabits = unserialize($foodHabits);
                      for (; $p < sizeof($foodHabits); $p++) {
                      ?>
                        <tr id="rowrm4<?php echo $p + 1; ?>">
                          <td><input type="text" name="foodHabits[]" value="<?php echo $foodHabits[$p]; ?>" class="form-control name_list" /></td>
                          <td><button type="button" name="remove" id="rm4<?php echo $p + 1; ?>" class="btn btn-danger btn_remove">X</button></td>
                        </tr>
                      <?php

                      }
                      ?>
                    </table>
                  <?php
                  }
                  ?>

                  <table class="table " id="dynamic_field4">
                    <tr>
                      <td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
                      <td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
                    </tr>
                  </table>
                </div>
              </div>
              <input type="hidden" name="hospitalID" value="<?php echo $hospitalID; ?>">
              <input type="hidden" name="doctorID" value="<?php echo $id; ?>">
              <input type="hidden" name="patientID" value="<?php echo $patientID; ?>">
              <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</body>

</html>

<script>
  $(document).ready(function() {
    var i = <?php echo $x; ?>;
    $('#add1').click(function() {
      i++;
      $('#dynamic_field1').append('<tr id="rowrm1' + i + '"><td><input type="text" name="vitals[]" placeholder="Enter Previous Medication" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm1' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
<script>
  $(document).ready(function() {
    var j = <?php echo $y; ?>;
    $('#add2').click(function() {
      j++;
      $('#dynamic_field2').append('<tr id="rowrm2' + j + '"><td><input type="text" name="previousMedication[]" placeholder="Enter Previous Diseases" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm2' + j + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
<script>
  $(document).ready(function() {
    var k = <?php echo $z; ?>;
    $('#add3').click(function() {
      k++;
      $('#dynamic_field3').append('<tr id="rowrm3' + k + '"><td><input type="text" name="allergicReactions[]" class="form-control name_list" /></td><td><button type = "button" name = "remove" id = "rm3' + k + '" class = "btn btn-danger btn_remove"> X </button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>

<script>
  $(document).ready(function() {
    var l = <?php echo $p; ?>;
    $('#add4').click(function() {
      l++;
      $('#dynamic_field4').append('<tr id="rowrm4' + l + '"><td><input type="text" name="allergicReactions[]" class="form-control name_list" /></td><td><button type = "button" name = "remove" id = "rm4' + l + '" class = "btn btn-danger btn_remove"> X </button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>