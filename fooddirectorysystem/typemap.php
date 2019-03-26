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
                height: 460px;
                width: 550px;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .legend {
                font-family: Arial, sans-serif;
                background: gray;
                color: white;
                padding: 10px;
                margin: 10px;
                border: 2px solid #000;
                width: 300px;
            }
            .legene img{
                vertical-align: center;
            }
        </style>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    </head>
    <body>
        <?php
        include("config/config.php");
        include("userauth.php");
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
                                <li><a class="selected" href="typemap.php">Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7">
                                <div id="map"></div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <select name="city" id="city" class="form-control" onchange="choose();">
                                    <option value="default">-- Select City --</option>
                                    <option value="mdy">Mandalay</option>
                                    <option value="ygn">Yangon</option>
                                    <option value="npt">Nay Pyi Taw</option>
                                </select>
                                <hr>
                                <div class="well well-sm pad">
                                    <img src="images/icons/default.png" alt=""> myanmar foods<br/>
                                    <img src="images/icons/japan.png" alt=""> Japan foods<br/>
                                    <img src="images/icons/k.png" alt=""> korean foods<br/>
                                    <img src="images/icons/coffee.png" alt=""> Cafe'<br/>
                                    <img src="images/icons/bars.png" alt=""> bars<br/>
                                    <img src="images/icons/rests.png" alt=""> Restaurants<br/>
                                </div>
                            </div>
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
        center: {lat: x, lng: y}
        });
        <?php
        $getstore = "SELECT * FROM food_store fs, store_map sm 
        WHERE fs.store_id=sm.foodstore_id";
        $get = @mysql_query($getstore) or die(mysql_error());
        ?>
        <?php
        while ($mapmarks = mysql_fetch_assoc($get)):
        $fsname = $mapmarks['store_name'];
        $lat = $mapmarks['lat'];
        $lng = $mapmarks['lng'];
        $type = $mapmarks['typeid'];
        $logo = $mapmarks['logo'];
        $phno = $mapmarks['phno'];
        $prng = $mapmarks['pricerng'];
        $latp = (float) $lat;
        $lngp = (float) $lng;
        ?>

        var infowindow = new google.maps.InfoWindow({
        content: ""
        });
        marker = new google.maps.Marker({
        map: map,
        draggable: false,
        <?php if ($type == "FST01"): ?>
        icon: 'images/icons/rests.png',
        <?php elseif ($type == "FST02"): ?>
        icon: 'images/icons/k.png',
        <?php elseif ($type == "FST03"): ?>
        icon: 'images/icons/japan.png',
        <?php elseif ($type == "FST04"): ?>
        icon: 'images/icons/coffee.png',
        <?php elseif ($type == "FST05"): ?>
        icon: 'images/icons/bars.png',
        <?php elseif ($type == "FST06"): ?>
        icon: 'images/icons/default.png',
        <?php endif; ?>
        position: {lat: <?php echo $latp; ?>, lng: <?php echo $lngp; ?>}
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
        <?php endwhile; ?>
        }

        function choose(){    
            var city = document.getElementById('city').value;
            if(city!=="default"){
                window.location = 'typemap.php?city='+city;
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZW2GmsDAt2u4nAWt0dmUOg-S82bFKmW8&callback=initMap">
    </script>
</html>
