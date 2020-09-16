<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="login/assets/img/favicon.ico">
    <title>IMS</title>
    <link rel="stylesheet" type="text/css" href="login/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login/assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="login/assets/js/html5shiv.min.js"></script>
        <script src="login/assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="index.html" class="form-signin">

                        <div align="center"> <h1>ICU MANAGEMENT SYSTEM </h1></div>
                        <br>
                        
                        <div class="account-logo">
                            <a href="index-2.html"><img src="login/assets/img/logo-dark.png" alt=""></a>
                        </div>
<div class="form-group">
    <label>Member</label>
    <select size="1" name="UserType" tabindex="1" language=" autofocus="" class="form-control"Javascript" onchange="UserType_onchange()" style="VERTICAL-ALIGN: middle; WIDTH: 360px">
          <OPTION Value="1" selected>ICU Login</OPTION>
           <OPTION Value="2" >Hospital Login</OPTION>
           <OPTION Value="3" >Doctor Login</OPTION>
           <OPTION Value="4" >Nurse Login</OPTION>

          </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" autofocus="" class="form-control" placeholder="Username" >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="login/assets/js/jquery-3.2.1.min.js"></script>
    <script src="login/assets/js/popper.min.js"></script>
    <script src="login/assets/js/bootstrap.min.js"></script>
    <script src="login/assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>