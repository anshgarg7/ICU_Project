<?php include "dash_common.php";
$ipdId =  $_GET["id"];
$ipdId = e_d('d', $ipdId);
?>

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


        <div class="col-md-12">
            <div class="main-card mb-3 card" style="overflow-x:scroll;">
                <div class="card-body">
                    <h5 class="card-title">Patient Details</h5>
                    <table class="mb-0 table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    test
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone
                                </td>
                                <td>
                                    test
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>test</td>
                            </tr>
                            <tr>
                                <td>
                                    Emergency Contact
                                </td>
                                <td>
                                    test
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Allergies
                                </td>
                                <td>
                                    test, test
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Previous Medication
                                </td>
                                <td>
                                    test, test, test
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Family History
                                </td>
                                <td>
                                    Nothing
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Previous Diseases
                                </td>
                                <td>
                                    test,test
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>