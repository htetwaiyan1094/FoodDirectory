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
                                <li><a class="selected" href="storeadd.php">Add</a></li>
                                <li><a href="storeedit.php">Edit</a></li>
                                <li><a href="stores.php">All Stores</a></li>
                                <li><a href="typemap.php">Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <form action="storedbadd.php" method="post" enctype="multipart/form-data">
                        <table class="table-condensed" style="width: 500px; margin-left: 250px">
                            <tr>
                                <h1 class="text-center" style="font-variant: small-caps;">Add Food Store</h1>
                            </tr>
                            <br/>
                            <tr>
                                <td style="text-align: right; width:120px;">Name :</td>
                                <td style="width:370px;">
                                    <input type="text" name="fsname" id="fsname" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Logo :</td>
                                <td><input type="file" name="logo" id="logo" class="form-control" /></td>
                            </tr>
                            <?php
                            $fstquery=mysql_query("SELECT * FROM storetype");
                            ?>
                            <tr>
                                <td style="text-align: right">Type :</td>
                                <td>
                                    <select name="fstype" id="fstype" class="form-control">
                                        <?php while($fstype=mysql_fetch_assoc($fstquery)): ?>
                                            <option value="<?php echo $fstype['typeid']; ?>">
                                                <?php echo $fstype['typename']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>                                
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Price Range :</td>
                                <td>
                                    <input type="text" name="prng" id="prng" class="form-control" 
                                    placeholder="eg. 1000ks to 2000ks" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Phone No :</td>
                                <td>
                                    <input type="text" name="phno" id="phno" class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Address :</td>
                                <td>
                                    <input type="text" name="address" id="address" class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Location :</td>
                                <td>
                                    <select name="loc" id="loc" class="form-control">
                                        <option value="mdy">Mandalay</option>
                                        <option value="ygn">Yangon</option>
                                        <option value="npt">Nay Pyi Taw</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Add" class="btn btn-primary"
                                    name="update" id="update" />&nbsp;&nbsp;
                                    <input type="reset" value="Reset" class="btn btn-info" />&nbsp;&nbsp;
                                    <a href="index_cus.php" style="text-decoration:none;border-bottom:none">
                                        <input type="button" value="Back to Home" class="btn btn-default">
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
        $(function() {
            $("form").validate({
            focusInvalid: true,
            rules: {
                "fsname": "required",
                "prng": "required",
                "phno": "required",
                "address": "required"
            },
            messages: {
                "fsname": "Plz enter your Store Name!",
                "prng": "Plz enter prices!",
                "phno": "Plz enter your Phone Number!",
                "address": "Plz enter your Address!",
            },
            error: function(label) {
                $(this).addClass("error");
            }
        });
    });
    </script>
</html>