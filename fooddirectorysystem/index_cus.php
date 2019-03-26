<?php
include("config/config.php");
include("userauth.php");

$sql = mysql_query("SELECT * FROM review r LEFT JOIN staff s 
ON r.stfid=s.stfid ORDER BY views DESC");
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
                                    <a class="selected" href="index_cus.php">
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
                <div id="content" class="two-column">
                        <div class="col-md-12">
                            <div>
                                <div class="panel panel-default" style="margin-left:15%; margin-right:15%;">
                                    <div class="row">
                                        <div class="col-md-12" style="height:500px;overflow-x:hidden;">
                                            <div class="panel-heading" style="background-color:black;color:white;">
                                                <h1 style="font-variant:small-caps;text-align:center">Top Reviews</h1>
                                            </div>
                                            <br/>
                                            <?php while($rev=mysql_fetch_assoc($sql)): ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $rev['photo'];?>" style="width:300px;height:200px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table-condensed">
                                                            <tr>
                                                                <td colspan="2">
                                                                    <a href="reviewdetail.php?rid=<?php echo $rev['revid']; ?>"
                                                                     style="text-decoration:none;border-bottom:none;">
                                                                        <h3><?php echo $rev['t_rev'];?></h3>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="glyphicon glyphicon-cutlery"></span>
                                                                    .&nbsp;&nbsp;posted by -
                                                                </td>
                                                                <td>
                                                                    <?php echo $rev['username']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="glyphicon glyphicon-user"></span>
                                                                    .  total views -
                                                                </td>
                                                                <td>
                                                                    <?php echo $rev['views']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <?php echo date('Y/m/d h:i a', strtotime($rev['revtime'])); ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
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
</html>