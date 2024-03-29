<?php include "dash_common.php";
?>

<!doctype html>
<html lang="en">



<!-- form area starts -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div><?php echo $name; ?>'s Dashboard
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="dashboard.php" method="POST">
                    <div class="wrap-input100">
                        <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
                                    <h5>ICU Room</h5>
                                </span></label><select class="form-control" name="room" id="room_c" required>
                                <option selected disabled>Select ICU Room</option>
                                <?php $room = getThis("SELECT `id`, `roomName` FROM `rooms` WHERE `hospitalId`='$hospitalId' ORDER BY `roomName` ASC") ?>
                                <?php foreach ($room as $k => $c) { ?>
                                    <option value="<?php echo $c['id']; ?>"><?php echo e_d('d', $c['roomName']); ?></option>
                                <?php } ?>
                            </select></div>
                        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Select Room</button>
                    </div>

                </form>
            </div>
        </div>


        <?php
        if (isset($_POST["submit"])) {

            $roomId = $_POST["room"];
            $rName = getThis("SELECT `roomName` FROM `rooms` WHERE `id`='$roomId'");
            $patients = getThis("SELECT `id`, `patientID`, `bedID`, `entryTime` from `ipdlog` WHERE `roomID`='$roomId' AND `enabled`= 1");
        ?>

            <div class="col-md-12">
                <div class="main-card mb-3 card" style="overflow-x:scroll;">
                    <div class="card-body">
                        <h4 class="card-title">Room <?php echo e_d('d', $rName[0]['roomName']); ?></h4>
                        <h5 class="card-title">Patient Details</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>Bed Number</th>
                                    <th>Patient Name</th>

                                    <th>Entry Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < sizeof($patients); $i++) {

                                ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $x = $patients[$i]['bedID'];
                                            $bedNumber = getThis("SELECT `bedNumber` FROM `beds` WHERE `id`='$x' AND `enabled`='1' ");
                                            $bedName = $bedNumber[0]['bedNumber'];
                                            echo e_d('d', $bedName);
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                            $x = $patients[$i]['patientID'];
                                            $name = getThis("SELECT `id`, `fullName` FROM `patients` WHERE `id` = '$x'");
                                            $fullName = $name[0]['fullName'];
                                            echo e_d('d', $fullName);
                                            ?>
                                        </td>
                                        <?php $entrytime = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($patients[$i]['entryTime'])); ?>
                                        <td><?php echo $entrytime; ?></td>
                                        <td>
                                            <a href="viewPatient.php?id=<?php echo e_d('e', $patients[$i]['id']); ?>" class="btn btn-block btn-primary">View Details</a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
    </disv>


    </body>

</html>