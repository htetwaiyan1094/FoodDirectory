<?php
  include("config/config.php");
  include("userauth.php");
    $query = "SELECT * FROM food_store fs, storetype st WHERE fs.typeid = st.typeid ";
    if ($_GET['n']!==""){
    $n = $_GET['n'];
    $query .= "AND store_name like '%$n%' ";
}
    if ($_GET['t'] !== 'default'){
    $t = $_GET['t'];
    $query .= "AND fs.typeid = '$t' ";
}
    if ( $_GET['l'] !== 'default'){
    $loc = $_GET['l'];
    if($loc=="mdy"){ $l="Mandalay";}
    else if($loc=="ygn"){ $l="Yangon";}
    else if($loc=="npt"){ $l="Nay Pyi Taw";}

    $query .= "AND location = '$l' ";
}
  $result = mysql_query($query) or die(mysql_error());
?>
  <?php while($row = mysql_fetch_assoc($result)): ?>
 <style>
 .slbl {
 	text-align: right;
 	width: 100px;
 }
 </style>                  
    <div class="col-md-12">
        <div class="well well-sm">
            <div class="row">
                <div class="col-md-4">
                    <?php if($row['logo']!=="nologo"){?>
                        <img src="<?php echo $row['logo']; ?>" style="width:240px;height:160px;">
                    <?php } else { ?>
                        <img src="images/stores/noimage.jpg" style="width:240px;height:160px;">
                    <?php } ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                	<table class="table-condensed">
						<tr>
                			<td class="slbl">Name :</td>
                			<td>
                                <a href="storedetail.php?fsid=<?php echo $row['store_id'] ?>" 
                                style="border-bottom:0px; text-decoration: none;">
                                    <strong><i><?php echo $row['store_name']; ?></i></strong>
                                </a>        
                            </td>
                		</tr>
                		<tr>
                			<td class="slbl">Type :</td>
                            <td><?php echo $row['typename']; ?></td>
                		</tr>
                		<tr>
                			<td class="slbl">Price Range :</td>
                            <td><?php echo $row['pricerng']; ?></td>
                		</tr>
                		<tr>
                			<td class="slbl">Phone No :</td>
                            <td><?php echo $row['phno']; ?></td>
                		</tr>
                		<tr>
                			<td class="slbl">Address :</td>
                            <td><?php echo $row['address']; ?></td>
                		</tr>
                        <tr>
                            <td class="slbl">Location :</td>
                            <td><?php echo $row['location']; ?></td>
                        </tr>
                	</table>
                </div>
            </div>
        </div>
    </div>
  <?php endwhile; ?>