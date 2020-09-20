<?php include "dash_common.php" ?>
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
        <form action="nurseroom_view.php" method="post">
            <div class="wrap-input100">
                <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
                            <h5>Department</h5>
                        </span></label><select class="form-control" name="department" id="department_c" required>
                        <option selected disabled>Select Nurse Department</option>
                        <?php $department = getThis("SELECT `id`, `departmentName` FROM `departments` ORDER BY `departmentName` ASC") ?>
                        <?php foreach ($department as $k => $c) { ?>
                            <option value="<?php echo $c['id']; ?>"><?php echo e_d('d',$c['departmentName']); ?></option>
                        <?php } ?>
                    </select></div>
                <div class="wrap-input100">
                    <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">
                                <h5>Nurses</h5>
                            </span></label><select class="form-control" name="nurse" id="nurse_c" required>
                            <option disabled selected>Select Department First</option>
                            <?php $nurse = getThis("SELECT `id`, `fullName` FROM `nurses` ORDER BY `fullName` ASC") ?>
                            <?php foreach ($nurse as $k => $c) { ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo e_d('d',$c['fullName']); ?></option>
                            <?php } ?>
                        </select></div>
                </div>

                <div class="wrap-input100">
                    <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">
                                <h5>Rooms</h5>
                            </span></label><select class="form-control" name="room" id="room_c" required>
                            <option disabled selected>Select Nurse First</option>
                            <?php $room = getThis("SELECT `id`, `roomName` FROM `rooms` ORDER BY `roomName` ASC") ?>
                            <?php foreach ($room as $k => $c) { ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo e_d('d',$c['roomName']); ?></option>
                            <?php } ?>
                        </select></div>
                </div>
                <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $("#department_c").change(function() {
            var departmentID = $("#department_c").val();
            $.ajax({
                url: '../assets/worldData.php',
                method: 'post',
                data: 'department=' + departmentID
            }).done(function(departments) {
                nurses = JSON.parse(departments);
                $('#nurse_c').empty();
                $('#nurse_c').append('<option disabled selected>Select Nurse</option>');
                nurses.forEach(function(nurse) {
                    $('#nurse_c').append('<option value=' + nurse.id + '>' + nurse.fullName + '</option>');
                })
                $('#nurse_c').append('<option value=0>My option is not listed</option>');
            })
        });
    })
</script>
