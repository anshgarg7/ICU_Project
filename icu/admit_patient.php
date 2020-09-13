<?php
include "dash_common.php";
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
    						<form action="functionality/prescription_act.php" method="POST">
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
                <div class="col-md-12">
                  <b>Email Address</b>
                  <div class="table-responsive">
                  <table class="table " id="dynamic_field">
                    <tr>
                      <td><input type="email" name="emailAddress" placeholder="Enter Patient Email Address" class="form-control name_list" /></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
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
      <div class="col-md-12">
        <b>Previous Medication</b>
        <div class="table-responsive">
          <table class="table " id="dynamic_field4">
            <tr>
              <td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
              <td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-12">
        <b>Previous Diseases</b>
        <div class="table-responsive">
          <table class="table " id="dynamic_field4">
            <tr>
              <td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
              <td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-12">
        <b>Allergies</b>
        <div class="table-responsive">
          <table class="table " id="dynamic_field4">
            <tr>
              <td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
              <td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-12">
        <b>Family History</b>
        <div class="table-responsive">
          <table class="table " id="dynamic_field4">
            <tr>
              <td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
              <td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-12">
        <b>Food Habits</b>
        <div class="table-responsive">
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
$(document).ready(function(){
	var i=1;
	$('#add4').click(function(){
		i++;
		$('#dynamic_field4').append('<tr id="row'+i+'"><td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
<script>
$(document).ready(function(){
	var i=1;
	$('#add4').click(function(){
		i++;
		$('#dynamic_field4').append('<tr id="row'+i+'"><td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
<script>
$(document).ready(function(){
	var i=1;
	$('#add4').click(function(){
		i++;
		$('#dynamic_field4').append('<tr id="row'+i+'"><td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
<script>
$(document).ready(function(){
	var i=1;
	$('#add4').click(function(){
		i++;
		$('#dynamic_field4').append('<tr id="row'+i+'"><td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
<script>
$(document).ready(function(){
	var i=1;
	$('#add4').click(function(){
		i++;
		$('#dynamic_field4').append('<tr id="row'+i+'"><td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>

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
