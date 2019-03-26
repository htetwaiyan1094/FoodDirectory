<?php
include("config/config.php");
include("userauth.php");
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
        <script src="js/bootstrap/bootstrap.js"></script>
        <style>
            .bg { 
                background-image: url("images/back.jpg");
                height: 14%;
                background-position: bottom;
                background-repeat: no-repeat;
                background-size: cover;
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
                                <li><a href="profileedit.php">Your Profile</a></li>
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
                    <div class="col-md-12">
                        <h1 style="text-align:center; font-variant:small-caps;">Change Password</h1>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <form action="pwchange2.php" method="post" enctype="multipart/form-data">
                                    <table class="table-condensed">
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="hidden" name="cusid" value="<?php echo $cusid; ?>">
                                        <tr>
                                            <td align="right">Old Password :</td>
                                            <td>
                                                <input type="password" name="oldpw" id="oldpw" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">New Password :</td>
                                            <td>
                                                <input type="password" name="newpw" id="newpw" class="form-control">
                                            </td>
                                        <tr>
                                            <td align="right">Re-enter New Password :</td>
                                            <td>
                                                <input type="password" name="rpw" id="rpw" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="submit" class="btn btn-primary" value="OK"
                                                      name="submit" style="width:55px;" />&nbsp;&nbsp;
                                                <a href="profileedit.php" style="text-decoration: none;">
                                                    <input type="button" value="Cancel" class="btn btn-default" />
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
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
        $(function () {
            $("form").validate({
                focusInvalid: true,
                rules: {
                    "oldpw": "required",
                    "newpw": "required",
                    "rpw": {
                        required: true,
                        equalTo: '#newpw'
                    }
                },
                messages: {
                    "oldpw": "Plz enter password!",
                    "newpw": "Plz enter password!",
                    "rpw": {
                        required: "Plz enter password!",
                        equalTo: "New passwords must be the same!"
                    }
                },
                error: function (label) {
                    $(this).addClass("error");
                }
            });
        });
    </script>
</html>