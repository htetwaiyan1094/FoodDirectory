<?php
include("../config/config.php");
include("adminauth.php");

if(isset($_GET['fsid'])){
    $fsid = $_GET['fsid'];
} else {
    echo "<script>window.location='storedetail_admin.php'</script>";
}

$fsget = mysql_query("SELECT * FROM food_store WHERE store_id='$fsid' ") or die(mysql_error());
$fs = mysql_fetch_assoc($fsget);

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
                                <li><a href="storeedit_admin.php">Edit</a></li>
                                <li><a href="reviewadd.php">Add Review</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <form action="storeupdate_admin.php" method="post" enctype="multipart/form-data">
                        <table class="table-condensed" style="width: 500px; margin-left: 250px">
                            <tr>
                                <h1 class="text-center" style="font-variant: small-caps;">Edit Food Store</h1>
                                <input type="hidden" name="fsid" value="<?php echo $fs['store_id'];?>" />
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <?php if($fs['logo']!=="nologo"): ?>
                                    <img src="../<?php echo $fs['logo'];?>" style="width:180px;height:120px;" >
                                    <?php else: ?>
                                    <img src="../images/stores/noimage.php" style="width:180px;height:120px;" >
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <br/>
                            <tr>
                                <td style="text-align: right; width:120px;">Name :</td>
                                <td style="width:370px;">
                                    <input type="text" name="fsname" id="fsname" class="form-control"
                                     value="<?php echo$fs['store_name'];?>" />
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
                                            <option <?php if($fstype['typeid']==$fs['typeid']){?> selected <?php }?> 
                                             value="<?php echo $fstype['typeid']; ?>" >
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
                                     value="<?php echo $fs['pricerng'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Phone No :</td>
                                <td>
                                    <input type="text" name="phno" id="phno" class="form-control"
                                     value="<?php echo $fs['phno'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Address :</td>
                                <td>
                                    <input type="text" name="address" id="address" class="form-control"
                                     value="<?php echo $fs['address'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Location :</td>
                                <td>
                                    <select name="loc" id="loc" class="form-control">
                                        <option value="mdy" 
                                        <?php if($fstype['location']=="mdy"){?> selected <?php }?> >
                                            Mandalay
                                        </option>
                                        <option value="ygn"
                                        <?php if($fstype['location']=="ygn"){?> selected <?php }?> >
                                            Yangon
                                        </option>
                                        <option value="npt"
                                        <?php if($fstype['location']=="npt"){?> selected <?php }?> >
                                            Nay Pyi Taw
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Update" class="btn btn-primary"
                                    name="update" id="update" />&nbsp;&nbsp;
                                    <input type="reset" value="Reset" class="btn btn-info" />&nbsp;&nbsp;
                                    <a href="storeedit_admin.php" style="border-bottom:none;text-decoration:none;">
                                        <input type="button" class="btn btn-default" value="Cancel">
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
    <script src="../js/jquery.validate.js"></script>
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