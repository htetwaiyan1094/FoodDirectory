<?php
if (isset($_GET['fsid']) && $_GET['fsid'] !== "") {
    $fsid = $_GET['fsid'];
} else {
    echo "<script>window.location='stores.php'</script>";
}
include("config/config.php");
include("userauth.php");
$mapquery = mysql_query("SELECT * FROM store_map where foodstore_id='$fsid' ") or die(mysql_error());
$rowmap = mysql_num_rows($mapquery);

$ratequery = mysql_query("SELECT * FROM store_rating where cusid='$cusid' AND store_id='$fsid' ") or die(mysql_error());
$rowrate = mysql_num_rows($ratequery);

$fsquery = mysql_query("SELECT * FROM food_store fs, storetype st 
    WHERE fs.typeid = st.typeid AND store_id='$fsid' ") or die(mysql_error());
$getfs = mysql_fetch_assoc($fsquery);

$rateq = mysql_query("SELECT ROUND(AVG(rate1),1) as r1, ROUND(AVG(rate2),1) as r2,
 ROUND(AVG(rate3),1) as r3 FROM store_rating sr GROUP BY store_id having store_id='$fsid' ");
$ratenum = mysql_num_rows($rateq);

$rater = mysql_num_rows(mysql_query("SELECT * FROM store_rating where store_id='$fsid' "));
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
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
                width: 150px;
            }
            .cmt-box{
                min-height: 400px;
            }
            .star {
                display: inline-block; }
            .star a {
                font-size: 1.8em;
                cursor: pointer;
                text-decoration: none;
                color: orange;
            }
            .x2 {
                vertical-align: text-top;
                font-size: 1.3em;
            }
            .cap tr td ,h3 {
                font-variant: small-caps;
            }
            .big {
                font-size: 1.2em;
                color: gray;
            }
            .rtotal {
                color: gray;
            }
        </style>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    </head>
    <script>
        function checkcmt(){
            if(docuemnt.getElementById('comment').value = ""){
                alert('You have not typed anything!');
            }
        }
    </script>
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
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if ($getfs['logo'] !== "nologo"): ?>
                                        <img src="<?php echo $getfs['logo'] ?>" style="width:400px;height:270px;">
                                    <?php else: ?>
                                        <img src="images/stores/noimage.jpg" style="width:400px;height:270px;">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <table class="table-condensed dtable">
                                        <tr>
                                            <td class="slbl">Name :</td>
                                            <td><?php echo $getfs['store_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="slbl">Type :</td>
                                            <td><?php echo $getfs['typename']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="slbl">Price Range :</td>
                                            <td><?php echo $getfs['pricerng']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="slbl">Phone No :</td>
                                            <td><?php echo $getfs['phno']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="slbl">Address :</td>
                                            <td><?php echo $getfs['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="slbl">Location :</td>
                                            <td><?php echo $getfs['location']; ?></td>
                                        </tr>
                                        <table class="table-condensed">
                                            <tr>
                                                <td align="center" width="180px">
                                                    <?php if ($rowrate < 1): ?>
                                                        <button class="btn btn-warning" data-toggle="modal" 
                                                                data-target="#rateModal">
                                                            <span class="fa fa-star"></span>
                                                            Rate
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" onclick="setmap();"
                                                            <?php if ($rowmap < 1) { ?> disabled<?php } ?> />
                                                    <span class="glyphicon glyphicon-map-marker"></span>
                                                    Map
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                                </table>
                            </div>
                        </div>
                        <?php if($ratenum>0): ?>
                        <?php $rget = mysql_fetch_assoc($rateq); ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Taste .
                                    <?php echo $rget['r1']; ?>
                                <span class="fa fa-star big"></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                Decoration .
                                    <?php echo $rget['r2']; ?>
                                <span class="fa fa-star big"></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                Service .
                                    <?php echo $rget['r3']; ?>
                                <span class="fa fa-star big"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="rtotal text-right" style="display:inline;">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <?php echo " . total (" .$rater .")"; ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="well well-sm cmt-box">
                                    <div>
                                        <div>
                                            <form action="cmt.php" method="post" enctype="multipart/form-data">
                                                <table>
                                                    <tr style="vertical-align:top;">
                                                        <td width="92%">
                                                            <input type="hidden" name="fsid" value="<?php echo $fsid; ?>" />
                                                            <input type="hidden" name="cusid" value="<?php echo $cusid; ?>" />
                                                            <textarea class="form-control" name="comment" id="comment"
                                                            style="resize:none; height:60px;" placeholder="Comment .."></textarea>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-warning" align="top" style="width:60px; height:60px;">
                                                                <span class="fa fa-comment fa-2x"></span>
                                                            </button>
                                                        </td>
                                                    <br/>
                                                    </tr>
                                                </table>
                                            </form>
                                            <hr>

                                            <?php
                                            $get = @mysql_query("SELECT * FROM commenting c LEFT JOIN le_customer lc
                                                 ON c.cus_id=lc.cus_id WHERE foodstore_id='$fsid' 
                                                  ORDER BY cmttime DESC") or die(mysql_error());
                                            $num = @mysql_num_rows($get);
                                            for ($i = 0; $i < $num; $i++) {
                                                $cusid = @mysql_result($get, $i, 'cus_id');
                                                $comment = @mysql_result($get, $i, 'comment');
                                                $time = @mysql_result($get, $i, 'cmttime');
                                                $gen = @mysql_result($get, $i, 'gender');
                                                $uname = @mysql_result($get, $i, 'username');
                                                $b = strtotime("$time");
                                                $c = time();
                                                $a = round(abs($c - $b) / 60, 2);
                                                if ($a < 2) {
                                                    $t = "just now";
                                                } else if ($a > 1 && $a < 60) {
                                                    $t = ceil($a) . " m ago";
                                                } else if ($a >= 60 && $a < (60 * 24)) {
                                                    $t = ceil(($a) / 60) . " hr ago";
                                                } else if ($a >= (60 * 24) && $a < (60 * 24 * 3)) {
                                                    $t = ceil($a / (60 * 24)) . " d ago";
                                                } else {
                                                    $t = date('h:i a . d-m-Y', strtotime("$time"));
                                                }
                                                ?>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <?php if ($gen == 'male'): ?>
                                                            <img src="images/profiles/male.jpg" class="media-object" style="width:80px">
                                                        <?php else: ?>
                                                            <img src="images/profiles/female.jpg" class="media-object" style="width:80px">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo $uname; ?> 
                                                            <small> . <i class="text-right"><?php echo $t; ?></i></small></h4>
                                                        <p><?php echo $comment; ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="rateModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 style="font-size: 1.7em; text-align:center;">Set Your Ratings.</h3>
                            </div>
                            <form action="rate.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="fsid" value="<?php echo $fsid; ?>">
                                <div class="modal-body">
                                    <table class="table-condensed cap">
                                        <tr>
                                            <td class="slbl x2">Taste : &nbsp;</td>
                                            <td>
                                                <div class='star' id='star1'></div>
                                                <input type="hidden" id="value1" name="value1" value="" />
                                                <input type="hidden" id="value2" name="value2" value="" />
                                                <input type="hidden" id="value3" name="value3" value="" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="slbl x2">Decoration : &nbsp;</td>
                                            <td>
                                                <div class='star' id='star2'></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="slbl x2">Service : &nbsp;</td>
                                            <td>
                                                <div class='star' id='star3'></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning" onclick="return checkstar();">Rate</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
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
<script type="text/javascript" src="js/starrr.js"></script>
<script>
    $('#star1').starrr({
        change: function (e, value) {
            if (value) {
                document.getElementById('value1').value = value;
            }
        }
    });
    $('#star2').starrr({
        change: function (e, value) {
            if (value) {
                document.getElementById('value2').value = value;
            }
        }
    });
    $('#star3').starrr({
        change: function (e, value) {
            if (value) {
                document.getElementById('value3').value = value;
            }
        }
    });

    function checkstar() {
        var x = document.getElementById('value1').value;
        var y = document.getElementById('value2').value;
        var z = document.getElementById('value3').value;
        if(x!=="" && y!=="" && z!==""){
            return true;
        } else {
            alert('Plz rate!');
            return false;
        }
    }

    function setmap() {
        window.location = 'storemaploc.php?fsid=<?php echo $fsid; ?>';
    }
</script>