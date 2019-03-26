<?php
include("config/config.php");
include("userauth.php");

if(isset($_GET['rid'])){
    $rid = $_GET['rid'];
} else {
    echo "<script>window.location='index_cus.php';</script>";
}

$sql = mysql_query("SELECT * FROM review WHERE revid='$rid' ");
$r = mysql_fetch_assoc($sql);
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
                            <div>
                                <div class="panel panel-default" style="margin-left:15%; margin-right:15%;">
                                    <div class="row">
                                        <div class="col-md-12" style="height:500px;overflow-x:hidden;">
                                            <div class="panel-heading">
                                                <h1><?php echo $r['t_rev']; ?> </h1>
                                            </div>
                                            <div class="col-md-12">
                                                <img src="<?php echo $r['photo'];?>" style="width:600px;height:350px;">
                                            </div>
                                            <div class="col-md-12">
                                                <p><?php echo $r['b_rev']; ?></p>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
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
<?php
$viewsql = "UPDATE review SET views = views+1 WHERE revid='$rid' ";
mysql_query($viewsql);
?>