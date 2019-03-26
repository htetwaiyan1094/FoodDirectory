<?php
include("config/config.php");
include("userauth.php");

$queryprofile = mysql_query("SELECT * FROM le_customer WHERE cus_id='$cusid' ") or die(mysql_error());
$profile = mysql_fetch_assoc($queryprofile);
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/datepicker.css">
        <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap/bootstrap.js"></script>
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
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    </head>
    <body>
        <div id="container">

            <div class="header bg">
                <div class="width">
                    <h1 style="font-variant: small-caps;"><a href="index_cus.php">Let's Eat</a></h1>
                </div>

                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="sidebar big-sidebar right-sidebar">
                    <ul>
                        <li>
                            <ul class="blocklist">
                                <li>
                                    <a href="index_cus.php">
                                        <span class="glyphicon glyphicon-home"></span> Home
                                    </a>
                                </li>
                            </ul>
                            <h5><span class="glyphicon glyphicon-user"></span> User Prfoile</h5>
                            <ul class="blocklist">
                                <li><a class="selected" href="profileedit.php">Your Profile</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                            <h5><span class="glyphicon glyphicon-cutlery"></span> Food Stores</h5>
                            <ul class="blocklist">
                                <li><a href="search.php">Search</a></li>
                                <li><a href="storeadd.php">Add</a></li>
                                <li><a href="storeedit.php">Edit</a></li>
                                <li><a href="stores.php">All Stores</a></li>
                                <li><a href="typemap.php">Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <form action="profileupdate.php" method="post" enctype="multipart/form-data">
                        <table class="table-condensed" style="width: 500px; margin-left: 250px">
                            <input type="hidden" name="cusid" value="<?php echo $profile['cus_id']; ?>" />
                            <tr>
                                <h1 class="text-center" style="font-variant: small-caps;">Edit Profile</h1>
                            </tr>
                            <br/>
                            <tr>
                                <td style="text-align: right; width:120px;">Username :</td>
                                <td style="height:50px;">
                                    &nbsp;<strong style="font-style: italic;"><?php echo $profile['username']; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">First Name :</td>
                                <td>
                                    <input type="text" name="fname" id="fname" class="form-control" 
                                    value="<?php echo $profile['firstname']; ?>" />                                   
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Last Name :</td>
                                <td>
                                    <input type="text" name="lname" id="lname" class="form-control" 
                                    value="<?php echo $profile['lastname']; ?>" /> 
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Gender :</td>
                                <td>
                                    <select class="form-control" name="gen" id="gen">
                                        <option <?php if($profile['gender']=="male"){ ?> selected <?php } ?> 
                                        value="male">Male</option>
                                        <option <?php if($profile['gender']=="female"){ ?> selected <?php } ?> 
                                        value="female">Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Date of Birth :</td>
                                <td>
                                    <input type="text" name="dob" id="dob" class="form-control" 
                                    value="<?php echo $profile['dob'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">email :</td>
                                <td>
                                    <input type="text" name="email" id="email" class="form-control" 
                                    value="<?php echo $profile['email'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Phone No :</td>
                                <td>
                                    <input type="text" name="phno" id="phno" class="form-control" 
                                    value="<?php echo $profile['cus_phno'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Update" class="btn btn-primary"
                                     name="update" id="update" /> &nbsp;
                                    <input type="reset" value="Reset" class="btn btn-info" /> &nbsp;
                                    <a href="index_cus.php" style="border-bottom:none;text-decoration:none;">
                                        <input type="button" class="btn btn-default" value="Cancel" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>                                    
                                    <a href="pwchange.php" style="text-decoration: none;">
                                        <p>Change password ?</p>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
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
                "phno": "required"
            },
            messages: {
                "fname": "Plz enter your First Name!",
                "lname": "Plz enter your Last Name!",
                "email": {
                    required: "E-mail Address!",
                    email: "Wrong format!"
                },
                "phno": "Plz enter your Phone Number!"
            },
            error: function(label) {
                $(this).addClass("error");
            }
        });
    });
    </script>
</html>