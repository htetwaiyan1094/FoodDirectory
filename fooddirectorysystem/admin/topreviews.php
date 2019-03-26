<?php
include("../config/config.php");
include("adminauth.php");

$get = mysql_query("SELECT * FROM review r LEFT JOIN staff s 
 ON r.stfid=s.stfid ORDER BY views DESC");
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
    table tr th a:hover,active, focus, .dynatable-head{
      text-decoration: none;
      border-bottom: none;
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
                <th>Title</th>
                <th>Total views</th>
                <th>Uploader</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($a = mysql_fetch_assoc($get)): ?>
                <tr>
                    <td><?php echo $a['t_rev']; ?></td>
                    <td><?php echo $a['views']; ?></td>
                    <td><?php echo $a['username']; ?></td>
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