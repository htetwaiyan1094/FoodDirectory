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
            .slbl {
                text-align: right;
                width: 100px;
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
                                <li><a class="selected" href="stores.php">All Stores</a></li>
                                <li><a href="typemap.php">Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <h2 class="text-center">All Shops</h2>
                <div id="content" class="two-column with-right-sidebar">
                    <?php
                    include("config/config.php");
                    include("userauth.php");

                    $limit = 2;
                    $start = 0;

                    $total = mysql_query("SELECT * FROM food_store");
                    $total = mysql_num_rows($total);

                    if (isset($_GET['start'])) {
                        $start = $_GET['start'];
                    }

                    $next = $start + $limit;
                    $prev = $start - $limit;
                    $result = mysql_query("SELECT * FROM food_store fs LEFT JOIN storetype st 
                    ON fs.typeid = st.typeid ORDER BY fs.store_name LIMIT $start, $limit") or die(mysql_error());
                    ?>
                    <?php while ($row = mysql_fetch_assoc($result)): ?>  
                        <div class="col-md-12">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php if ($row['logo'] !== "nologo") { ?>
                                            <img src="<?php echo $row['logo']; ?>" style="width:240px;height:160px;">
                                        <?php } else { ?>
                                            <img src="images/stores/noimage.jpg" style="width:240px;height:160px;">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7">
                                        <table class="table-condensed">
                                            <tr>
                                                <td class="slbl">Name :</td>
                                                <td>
                                                    <a href="storedetail.php?fsid=<?php echo $row['store_id'] ?>" 
                                                       style="border-bottom:0px; text-decoration: none;">
                                                        <strong><i><?php echo $row['store_name']; ?></i></strong>
                                                    </a> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="slbl">Type :</td>
                                                <td><?php echo $row['typename']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="slbl">Price Range :</td>
                                                <td><?php echo $row['pricerng']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="slbl">Phone No :</td>
                                                <td><?php echo $row['phno']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="slbl">Address :</td>
                                                <td><?php echo $row['address']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row"></div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <div class="paging" align="center">
                        <?php if ($total > $limit): ?>
                            <?php if ($prev < 0): ?>
                                <button class="btn btn-default" disabled><span class="glyphicon glyphicon-chevron-left"></span> Prev<button>
                                    <?php else: ?> 
                                        <a href="?start=<?= $prev ?>" style="text-decoration:none;border-bottom:none;">
                                            <button class="btn btn-default"/><span class="glyphicon glyphicon-chevron-left"></span> Prev</button>
                                    </a>
                                <?php endif; ?>

                                <?php if ($next >= $total): ?>
                                    <button class="btn btn-default" disabled>Next <span class="glyphicon glyphicon-chevron-right"></span></button>
                                <?php else: ?> 
                                    <a href="?start=<?= $next ?>" style="text-decoration:none;border-bottom:none;">
                                        <button class="btn btn-default">Next <span class="glyphicon glyphicon-chevron-right"></span></button>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
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