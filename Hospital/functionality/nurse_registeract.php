<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
 	?>
 	<script type="text/javascript">
 		window.location='logout.php';
 	</script>
	<?php
}
$name = e_d('e',$_POST['name']);
$phone = e_d('e',$_POST['phone']);
$email = e_d('e',$_POST['email']);
$address = e_d('e',$_POST['add1']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$hospitalID = $_SESSION["UID"];
$departmentID = $_POST['did'];
$dob = $_POST['dob'];

// if(isset($_POST['submit']))
// {
//     doThis("INSERT INTO `doctors`(`hospitalID`, `departmentID`, `qualificationID`, `fullName`, `phoneNumber`, `emailAddress`, `dob`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `createdAt`) VALUES ('$hospitalID','$departmentID','$qualificationID','$name','$phone','$email','$dob','$address','$city','$state','$country','$email','$phone',CURRENT_TIMESTAMP())");

 //     <script>
 //         alert("Doctor Registered Successfully!!");
//         window.location = "../doctor_register.php";
 // </script>

 // }



if(isset($_POST['submit']))
{


        $email_check  = getThis("select * from `nurses` where `emailAddress` = '$email'");
        if(sizeof($email_check) > 0)
        {
            ?>
            <script> alert("This email is already present");
              window.location='../nurse_register.php';
            </script>
            <?php
        }
        else
        {
            $insert_query = doThis("INSERT INTO `nurses`(`hospitalID`, `departmentID`, `fullName`, `phoneNumber`, `emailAddress`, `dob`, `address`, `cityID`, `stateID`, `countryID`, `username`, `password`, `createdAt`) VALUES ('$hospitalID','$departmentID','$name','$phone','$email','$dob','$address','$city','$state','$country','$email','$phone',CURRENT_TIMESTAMP())");

            if($insert_query)
            {
                ?>
                <script>
                    alert("Registration Done. Now You Can Login!!");
                    window.location = "../../index.php";
                    </script>
                    <?php
            }
           else
           {
            ?>
            <script> alert("There is some technical error");
              window.location='../../index.php';
            </script>
            <?php
           }
        }
    }



?>
