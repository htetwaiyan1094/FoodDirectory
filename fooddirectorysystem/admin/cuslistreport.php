<?php
include("../config/config.php");
include("adminauth.php");
if(!isset($_GET['m'])){
  $get = mysql_query("SELECT * FROM le_customer ORDER BY firstname");
} else {
  $m = $_GET['m'];
  $get = mysql_query("SELECT * FROM le_customer where MONTH(date_joined)='$m' ");
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
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($a = mysql_fetch_assoc($get)): ?>
                <tr>
                    <td><?php echo $a['firstname']." ".$a['lastname']; ?></td>
                    <td><?php echo $a['gender']; ?></td>
                    <td><?php echo $a['email']; ?></td>
                    <td><?php echo $a['cus_phno']; ?></td>
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
            features: {
                paginate: true,
                search: true,
                recordCount: false,
                perPageSelect: false,
                sort: true
            }
        });
    })
</script>