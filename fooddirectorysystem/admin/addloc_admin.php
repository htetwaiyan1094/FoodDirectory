<?php
include("../config/config.php");
include("adminauth.php");
if (isset($_GET['fsid'])) {
    $fsid = $_GET['fsid'];
} else {
    echo "<script>window.location='storeedit_admin.php'</script>";
}
$getsfs = "SELECT * FROM food_store where store_id = '$fsid' ";
$get = @mysql_query($getsfs) or die(mysql_error());
$mapmark = mysql_fetch_assoc($get);
$storeid = $mapmark['store_id'];
$fsname = $mapmark['store_name'];

if (!isset($_GET['city'])) {
    echo "<script>var x = 21.9874; var y = 96.0832;</script>";
} else {
    $city = $_GET['city'];
    if ($city == "mdy") {
        echo "<script>var x = 21.9874; var y = 96.0832;</script>";
    } else if ($city == "ygn") {
        echo "<script>var x = 16.8638; var y = 96.1934;</script>";
    } else if ($city == "npt") {
        echo "<script>var x = 19.7635; var y = 96.0789;</script>";
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" type="text/css" />
        <script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
        <script src="../js/bootstrap/bootstrap.js"></script>
        <style>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel panel-default" align="center">
                                    <div class="panel-heading" 
                                     style="background-color: slategray; color: white;" >
                                        <h2 align="center">
                                            Location for 
                                            <strong><i><?php echo $fsname; ?></i></strong>
                                        </h2>
                                        <form action="addlocdb_admin.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="fsid" id="fsid" 
                                             value="<?php echo $fsid; ?>" />
                                            <input type="hidden" name="lat" id="lat" />
                                            <input type="hidden" name="lng" id="lng" />
                                            <select id="city" class="form-control" onchange="choose();" 
                                             style="width:200px; display:inline;">
                                                <option value="default">-- Select City</option>
                                                <option value="mdy">-- Mandalay --</option>
                                                <option value="ygn">-- Yangon --</option>
                                                <option value="npt">-- Nay Pyi Taw --</option>
                                            </select>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="submit" name="submit" value=" OK " class="btn btn-default"
                                             onclick="return check();" />
                                            <a href="storeedit_admin.php"
                                             style="border-bottom:none; text-decoration:none;">
                                                <input type="button" value="Back" class="btn btn-default" />
                                            </a>
                                        </form>
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
          zoom: 12,
          center: {lat: x, lng: y}
        });
        
        function mark(location) {
          marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: location
        });
        }
        
        map.addListener('click', function(event){
          if (marker && marker.setMap) {
            marker.setMap(null);
        }
          mark(event.latLng);
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();
          document.getElementById("lat").value = lat;
          document.getElementById("lng").value = lng;
        });
      }

      function check(){
        if ( !marker ){
            alert('Choose your location!');
            return false;
        } else {
            return true;
        }
      }

        function choose(){    
            var city = document.getElementById('city').value;
            if(city!=="default"){
                window.location = 'addloc_admin.php?fsid=<?php echo $fsid;?>&city='+city;
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZW2GmsDAt2u4nAWt0dmUOg-S82bFKmW8&callback=initMap">
    </script>
</html>
