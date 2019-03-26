<?php
include("../config/config.php");
include("adminauth.php");
if (!isset($_GET['city'])) {
  $get = mysql_query("SELECT fs.store_name, AVG((rate1+rate2+rate3)/3) AS overall FROM store_rating sr 
     LEFT JOIN food_store fs ON sr.store_id=fs.store_id GROUP BY sr.store_id ORDER BY overall DESC");
} else {
    $city = $_GET['city'];
    if($city=="mdy"){ $l="Mandalay";}
    else if($city=="ygn"){ $l="Yangon";}
    else if($city=="npt"){ $l="Nay Pyi Taw";}
  $get = mysql_query("SELECT fs.store_name, AVG((rate1+rate2+rate3)/3) AS overall FROM store_rating sr 
     LEFT JOIN food_store fs ON sr.store_id=fs.store_id WHERE fs.location='$l' GROUP BY sr.store_id ORDER BY overall DESC ");
}
?>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../js/dynatable/jquery.dynatable.css">
<style>
    table tr th{
        background-color: black;
        color: white;
        height: 40px;
        text-align: center;
    }
    table tr td{
        height: 40px;
        width: 58%;
    }
    .dynatable-page-link{
        color: gray;
        text-decoration: none;
        border-bottom: none;
        cursor: pointer;
    }
    .dynatable-active-page{
        color: white;
        background-color: gray;
    }
</style>
<div>
    <table id="my-final-table" class="table-bordered">
        <thead>
            <tr>
                <th>Food Store</th>
                <th>Avg Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($a = mysql_fetch_assoc($get)): ?>
                <tr>
                    <td><?php echo $a['store_name']; ?></td>
                    <td><?php echo round($a['overall'],1); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="../js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" charset="utf8" src="../js/dynatable/jquery.dynatable.js"></script>
<script>
    $(function () {
        $("#my-final-table").dynatable({
            table: {
                defaultColumnIdStyle: 'underscore'
            },
            features: {
                paginate: true,
                search: true,
                recordCount: false,
                perPageSelect: false,
                sort: false
            }
        });
    })
</script>