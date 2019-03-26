<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css" type="text/css" />
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
            .scontainer {
                padding: 30px;
            }
        </style>
        <meta name="viewport" content="width=device-width, height=device-height, minimum-scale=1.0, maximum-scale=1.0" />
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
                                <li><a class="selected" href="search.php">Search</a></li>
                                <li><a href="storeadd.php">Add</a></li>
                                <li><a href="storeedit.php">Edit</a></li>
                                <li><a href="stores.php">All Stores</a></li>
                                <li><a href="typemap.php">Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <div class="scontainer">
                        <div class="row" style="height: 60px">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="sname" id="sname" placeholder="Shop Name" />
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="stype" id="stype">
                                    <option value="default">-- Select Shop Type --</option>
                                    <?php
                                    include("config/config.php");
                                    $fstquery = mysql_query("SELECT * FROM storetype");
                                    while ($fstype = mysql_fetch_assoc($fstquery)): ?>
                                        <option value="<?php echo $fstype['typeid']; ?>">
                                            <?php echo $fstype['typename']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="sloc" id="sloc">
                                    <option value="default">-- Select City --</option>
                                    <option value="mdy">Mandalay</option>
                                    <option value="ygn">Yangon</option>
                                    <option value="npt">Nay Pyi Taw</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info" onclick="search();">
                                    <span class="glyphicon glyphicon-search"></span> Search
                                </button>
                            </div>
                        </div>
                        <div id="result" class="two-column with-right-sidebar" style="width: 100%; height: 400px; overflow-x: hidden;">
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
<script>
    function search() {
        var n = document.getElementById('sname').value;
        var t = document.getElementById('stype').value;
        var l = document.getElementById('sloc').value;
        $('#result').load('storesearch.php?n=' + n + '&t=' + t + '&l=' + l);
    }
</script>