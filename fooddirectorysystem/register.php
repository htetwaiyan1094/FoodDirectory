<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="css/datepicker.css">
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/signup/signup.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<style>
    .bg { 
        background-image: url("images/back.jpg");
        height: 14%;
        background-position: bottom;
        background-repeat: no-repeat;
        background-size: cover;
    }
    #dob {
        cursor: pointer;
    }
    </style>
    </head>
<body>
<div id="container">

    <div class="header bg">
    <div class="width">
        <h1 style="font-variant: small-caps;"><a href="index.php">Let's Eat</a></h1>
            <div class="nav">
                    <ul class="sf-menu dropdown">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li class="selected"><a href="register.php">Register</a></li>
                    <li><a href="map.php">Map</a></li>
                </ul>
            </div>
        </div>

    <div class="clear"></div>
    </div>
        <div class="content">
            <form action="reg.php" method="post" class="form-group" name="regform" id="regform" enctype="multipart/form-data">
                    <table class="table-condensed" style="width: 600px; align: center; margin: auto;">
                        <tr>
                        <h1 class="text-center" style="font-variant: small-caps;">Register</h1>
                        </tr>
                        <tr>
                            <td width="150px" align="right">First Name : </td>
                            <td><input class="form-control" type="textbox" name="fname" id="fname" maxlength="30"/></td>
                        </tr>
                        <tr>
                            <td align="right">Last Name : </td>
                            <td><input class="form-control" type="textbox" name="lname" id="lname" maxlength="30"/></td>
                        </tr>
                        <tr>
                            <td align="right">Gender : </td>
                            <td><select class="form-control" name="gender" id="gender">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td align="right">Date of Birth : </td>
                            <td><input class="form-control" type="text" name="dob" id="dob" value="01/01/1990"></td>
                        </tr>
                        <tr>
                            <td align="right">E-mail : </td>
                            <td><input class="form-control" type="textbox" name="email" id="email" maxlength="50"/></td>
                        </tr>
                        <tr>
                            <td align="right">Phone No : </td>
                            <td><input class="form-control" type="textbox" name="phno" id="phno" maxlength="50"/></td>
                        </tr>
                        <tr>
                            <td align="right">User Name : </td>
                            <td><input class="form-control" type="textbox" name="uname" id="uname" maxlength="20" onChange="UserCheckAvail(this.value);
                                    document.getElementById('uname').value = trim(this.value);"/>
                            <span name="userChange" id="userChange" style="font-size: small; color:orange;">&nbsp;</span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td align="right">Password : 
                            <td><input class="form-control" type="password" name="pw" id="pw" maxlength="20"/></td></td>
                        </tr>
                        <tr>
                            <td align="right">Re-enter Password : 
                            <td><input class="form-control" type="password" name="rpw" id="rpw" maxlength="20"/></td></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><br/>
                                <input class="btn btn-primary" type="submit" id="submitMain" name="submitMain" value="Register"/>
                                &nbsp;&nbsp;&nbsp;
                                <input class="btn btn-default" type="reset" id="btnreset" name="btnreset" value="Reset" />
                            </td>
                        </tr>
                    </table>
                </form>
        </div>
    <div id="body" class="width">
        <div class="clear"></div>
    </div>
    <div class="footer">            
            <div class="clear"></div>
        <div class="footer-bottom">
        <p><h3 style="color:white; font-variant: small-caps;">&copy; Let's Eat</h3></p>
        </div>
    </div>
</div>
</body>
<script src="js/jquery.validate.js"></script>
<script>
$('#dob').datepicker({
        format: 'dd/mm/yyyy'
    });
$(function() {
    $("form").validate({
        focusInvalid: true,
        rules: {
            "fname": "required",
            "lname": "required",
            "email": {
                required: true,
                email: true
            },
            "phno": "required",
            "uname": "required",
            "pw": "required",
            "rpw": {
                required: true,
                equalTo: '#pw'
            }
        },
        messages: {
            "fname": "Plz enter your First Name!",
            "lname": "Plz enter your Last Name!",
            "email": {
                required: "E-mail Address!",
                email: "Wrong format!"
            },
            "phno": "Plz enter your Phone Number!",
            "uname": "Username!",
            "pw": "Password!",
            "rpw": {
                required: "Password!",
                equalTo: "Passwords must be the same!"
            }
        },
        error: function(label) {
            $(this).addClass("error");
        }
    });
});
</script>
</html>