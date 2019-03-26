<?php
include("adminauth.php");
$months = array(
'January',
'February',
'March',
'April',
'May',
'June',
'July ',
'August',
'September',
'October',
'November',
'December',
);
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
    <style>
        .rptlbl{
            font-variant: small-caps;
            font-size: 1.2em;
            padding: 0px;
            margin: 0px;
        }
        .bot {
            border-bottom: 1px solid #ddd;
        }
        .rpttbl {
            width: 100%;
        }
        #result{
            width: 90%;
        }
    </style>
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
                                <li><a class="selected" href="adminreport.php">Reports</a></li>
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
                            <div class="col-md-4">
                                <table class="table-condensed rpttbl">
                                    <tr>
                                        <td colspan="2">
                                            <p class="rptlbl">Top Rated Stores</p>
                                        </td>
                                    </tr>
                                    <tr class="bot">
                                        <td>
                                            <select name="city" id="city" class="form-control">
                                                <option value="default">-- City --</option>
                                                <option value="mdy">Mandalay</option>
                                                <option value="ygn">Yangon</option>
                                                <option value="npt">NayPyiTaw</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="trs();">
                                                Generate
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p class="rptlbl">Montly New Customers</p>
                                        </td>
                                    </tr>
                                    <tr class="bot">
                                        <td>
                                            <select name="cus" id="cus" class="form-control">
                                                <option value="default">-- Month --</option>
                                            <?php for ($m=1; $m<13; $m++): ?>
                                                <option value="<?php echo $m;?>"><?php echo $months[$m - 1]; ?></option>
                                            <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="cus();">Generate</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p class="rptlbl">Montly New Food Stores</p>
                                        </td>
                                    </tr>
                                    <tr class="bot">
                                        <td>
                                            <select name="fs" id="fs" class="form-control">
                                                <option value="default">-- Month --</option>
                                            <?php for ($m=1; $m<13; $m++): ?>
                                                <option value="<?php echo $m;?>"><?php echo $months[$m - 1]; ?></option>
                                            <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="fs();">Generate</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p class="rptlbl">Top Reviews</p>
                                        </td>
                                    </tr>
                                    <tr class="bot">
                                        <td colspan="2" style="padding-left: 20%;">
                                            <button class="btn btn-primary" onclick="rev();">Generate</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div id="result"></div>
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
        function trs(){
            var x = document.getElementById('city').value;
            if(x!=="default"){
                $('#result').load('topratedfs.php?city='+x);
            } else {
                $('#result').load('topratedfs.php');
            }
        }
        function cus(){
            var y = document.getElementById('cus').value;
            if(y!=="default"){
                $('#result').load('cuslistreport.php?m='+y);
            } else {
                $('#result').load('cuslistreport.php');
            }
        }
        function fs(){
            var fs = document.getElementById('fs').value;
            if(fs!=="default"){
                $('#result').load('monthlyfsreg.php?m='+fs);
            } else {
                $('#result').load('monthlyfsreg.php');
            }
        }
        function rev(){
            $('#result').load('topreviews.php');
        }
    </script>
</html>