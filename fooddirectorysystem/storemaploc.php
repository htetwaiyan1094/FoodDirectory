<?php
include("config/config.php");
if (isset($_GET['fsid'])) {
    $fsid = $_GET['fsid'];
} else {
    echo "<script>window.location='storedetail.php'</script>";
}
$getsfs = "SELECT * FROM store_map sm LEFT JOIN food_store fs 
 ON sm.foodstore_id=fs.store_id where foodstore_id = '$fsid' ";
$get = @mysql_query($getsfs) or die(mysql_error());
$mapmark = mysql_fetch_assoc($get);
$storeid = $mapmark['foodstore_id'];
$fsname = $mapmark['store_name'];
$prng = $mapmark['pricerng'];
$phno = $mapmark['phno'];
$logo = $mapmark['logo'];
$lat = $mapmark['lat'];
$lng = $mapmark['lng'];
$latp = (float) $lat;
$lngp = (float) $lng;
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
            #map {
                margin: 5px;
                height: 360px;
                width: 550px;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .legene img{
                vertical-align: center;
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
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel panel-default" align="center">
                                    <div class="panel-heading" 
                                     style="background-color: slategray; color: white;" >
                                        <h2>
                                            Map Location of 
                                            <strong><i><?php echo $fsname; ?></i></strong>
                                        </h2>
                                        <a href="storedetail.php?fsid=<?php echo $fsid;?>">
                                            <button class="btn btn-default">
                                                Back
                                            </button>
                                        </a>
                                    </div>
                                    <div id="map"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
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
    <script>
      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: <?php echo $latp; ?> , lng: <?php echo $lngp; ?>}
        });

        var infowindow = new google.maps.InfoWindow({
          content: ""
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: false,
          position: {lat: <?php echo $latp; ?> , lng: <?php echo $lngp; ?>}
        });

        google.maps.event.addListener(marker, 'click', function () {
        var info = '';
        info == "<?php if ($logo !== 'nologo'): ?>";
            info += '<img src="<?php echo $logo ?>" style="width:120px;height:80px;" /><br/>';
            info += "<?php else: ?>";
            info += "<img src='images/stores/noimage.jpg' style='width:120px;height:80px;' /><br/>";
            info += "<?php endif; ?>";
        info += '<strong><i><?php echo $fsname; ?></i></strong><br/>';
        info += '<?php echo $prng; ?><br/>';
        info += '<?php echo $phno; ?>';
        infowindow.setContent(info);
        infowindow.open(map, this);
        });

        marker.addListener('click', function() {
        map.panTo(this.getPosition());  
        });
      }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZW2GmsDAt2u4nAWt0dmUOg-S82bFKmW8&callback=initMap">
    </script>
</html>
