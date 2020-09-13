<?php include "dash_common.php"; ?>
<?php
$patients = getThis("SELECT `id`, `patientID`, `doctorID`, `bedID` from `ipdlog` WHERE `roomID`='$id'");

?>
<!doctype html>
<html lang="en">



<!-- form area starts -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div><?php echo $roomName; ?> Room Dashboard
                        <div class="page-title-subheading"><?php echo $roomDescription; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (sizeof($patients) == 0) {
        ?>
            <h4>There is no patient in this ICU</h4>
        <?php
        } else {
        ?>

            <div class="col-md-12">
                <div class="main-card mb-3 card" style="overflow-x:scroll;">
                    <div class="card-body">
                        <h5 class="card-title">ICU Details</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>Bed Number</th>
                                    <th>Patient Name</th>
                                    <th>Lead Doctor</th>
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
                                        <td>
                                            <?php
                                            $x = $patients[$i]['doctorID'];
                                            $docName = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$x'");
                                            $docName = $docName[0]['fullName'];
                                            echo e_d('d', $docName);
                                            ?>
                                        </td>
                                        <td>
                                            <a href="test.php?id=<?php echo e_d('e', $patients[$i]['id']); ?>" class="btn btn-block btn-primary">View Details</a>
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
    </div>
</div>


<?php
        } ?>

</body>

</html>