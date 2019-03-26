<?php
include("../config/config.php");
include("adminauth.php");
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
                                <li><a class="selected" href="reviewadd.php">Add Review</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="two-column with-right-sidebar">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <h2 style="font-variant:small-caps;">
                                    Food Review
                                </h2>
                            </div>
                            <div class="col-md-7">
                                <form action="reviewadddb.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="stfid" value="<?php echo $stfid; ?>">
                                    <table class="table-condensed">
                                        <tr>
                                            <td>Title :</td>
                                            <td>
                                                <input type="text" name="title" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Photo :</td>
                                            <td>
                                                <input type="file" name="rphoto" id="rphoto" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <textarea name="desc" class="form-control" 
                                                style="width:100%;height:300px;resize:none;overflow-x:hidden;"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td align="center">
                                                <input type="submit" value="Create" class="btn btn-primary" onclick="return check();">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
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
    <script src="../js/jquery.validate.js"></script>
    <script>

        function check(){
            var x = document.getElementById('rphoto').value;
            if(!x){
                alert('Choose Image!');
                return false;
            } else {
                return true;
            }
        }

        $(function() {
            $("form").validate({
            focusInvalid: true,
            rules: {
                "title": "required",
                "desc": "required"
            },
            messages: {
                "title": "Plz enter your Store Name!",
                "desc": "Plz enter prices!"
            },
            error: function(label) {
                $(this).addClass("error");
            }
        });
    });
    </script>
</html>