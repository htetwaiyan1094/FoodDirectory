<?php
include("../config/config.php");
include("adminauth.php");

$fsquery = mysql_query("SELECT * FROM food_store where cus_id IS NULL ") or die(mysql_error());
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" type="text/css" />
        <script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    </head>
    <body>
        <div id="container">

            <div class="header bg">
                <div class="width">
                    <h1 style="font-variant:small-caps; color:white; margin-top:0px;">
                        Let's Eat
                    </h1>
                    <div align="right">
                        <h3 style="color:white;">Admin Panel</h3>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="sidebar big-sidebar right-sidebar">
                    <ul>
                        <li>
                            <ul class="blocklist">
                                <li><a href="adminreport.php">Reports</a></li>
                                <li><a href="logout.php">Logout</a></li><br/>
                            </ul>
                            <h5><span class="glyphicon glyphicon-cutlery"></span> Food Stores</h5>
                            <ul class="blocklist">
                                <li><a href="storemanage.php">Manage</a></li>
                                <li><a href="storeadd_admin.php">Add</a></li>
                                <li><a class="selected" href="storeedit_admin.php">Edit</a></li>
                                <li><a href="reviewadd.php">Add Review</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <h1 style="text-align:center; font-variant:small-caps;">Added Food Stores by Admins</h1>
                    <div class="col-md-12">

                        <?php while ($fslist = mysql_fetch_assoc($fsquery)): ?>
                                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-11">
                                    <table class="table-condensed">
                                            <tr>
                                                <td width="350px" align="center">
                                                    <?php if($fslist['logo']!=="nologo"): ?>
                                                    <img src="../<?php echo $fslist['logo']; ?>" style="width:240px;height:160px">
                                                    <?php else: ?>
                                                    <img src="../images/stores/noimage.jpg" style="width:240px;height:160px">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <strong><i><?php echo $fslist['store_name']; ?></i></strong>
                                                    <br/><br/>
                                                    <?php echo $fslist['address']; ?><br/><br/>
                                                    <?php echo $fslist['phno']; ?>
                                                </td>
                                                <td align="right">
                                                    <a href="addloc_admin.php?fsid=<?php echo $fslist['store_id'];?>"
                                                     style="border-bottom:none; text-decoration:none;">
                                                        <button class="btn btn-warning">
                                                            <span class="glyphicon glyphicon-map-marker"></span>
                                                            Map
                                                        </button>
                                                    </a>&nbsp;&nbsp;&nbsp;
                                                    <a href="fsdetailedit_admin.php?fsid=<?php echo $fslist['store_id'];?>"
                                                     style="border-bottom:none; text-decoration:none;">
                                                        <button class="btn btn-warning">
                                                            <span class="glyphicon glyphicon-cog"></span>
                                                            Edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                            </div>
                        <?php endwhile; ?>
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