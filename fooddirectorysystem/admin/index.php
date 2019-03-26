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
                <div class="sidebar big-sidebar right-sidebar"></div>
                <div class="two-column with-right-sidebar">
                    <form class="form-group" action="adminloginn.php" method="post" name="frm_login" enctype="multipart/form-data">
                        <div align="center">
                            <table class="table-condensed" style="width:400px; margin: auto">
                                <tr>
                                <h1 style="font-variant: small-caps;">Log In</h1>
                                </tr>
                                <tr>
                                    <td width="100px" align="right">Username :</td>
                                    <td><input type="text" class="form-control" name="uname" id="uname" size="33"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Password :</td>
                                    <td><input type="password" class="form-control" name="password" id="password" size="33" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="submit" class="btn btn-primary" name="submitMain" value="Admin Login"/>
                                </tr>
                            </table>
                        </div>
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
            "uname": "required",
            "password": "required"
        },
        messages: {
            "uname": "Plz enter your username!",
            "password": "Plz enter your password!"
        },
        error: function(label) {
            $(this).addClass("error");
        }
    });
});
</script>
</html>