<?php include("../includes/conn.php"); ?>
<!doctype html>
<html>
<?php include("../includes/head.php"); ?>
<body>
<table width="802" border="1" class="table table-hover">
  <tbody>
	
    <tr>
      <td width="10" align="center">ที่</td>
      <td width="108" align="center">หมายเลขครุภัณฑ์</td>
      <td width="46" align="center">รายการ</td>
      <td width="74" align="center">ประเภทพัสดุ</td>
      <td width="65" align="center">วันที่รับโอน</td>
      <td width="49" align="center">วัที่ได้มา</td>
      <td width="53" align="center">แหล่งเงิน</td>
      <td width="42" align="center">จำนวน</td>
      <td width="74" align="center">ห้องที่ใช้งาน</td>
      <td width="72" align="center">ผู้รับผิดชอบ</td>
      <td width="139" align="center">จัดการ</td>
    </tr>
	      <?php
                    $sql = "SELECT * FROM `eqnomal`";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){	 
                    ?>
	  
    <tr>
      <td align="center"><?php  echo $row['sum_id'];?></td>
      <td align="center"><?php  echo $row['sumnum'];?></td>
      <td align="center"><?php  echo $row['name'];?></td>
      <td align="center"><?php  echo $row['type'];?></td>
      <td align="center"><?php  echo $row['date1'];?></td>
      <td align="center"><?php  echo $row['date2'];?></td>
      <td align="center"><?php  echo $row['money'];?></td>
      <td align="center"><?php  echo $row['num'];?></td>
      <td align="center"><?php  echo $row['room'];?></td>
      <td align="center"><?php  echo $row['responsible'];?></td>
      <td align="center">&nbsp;</td>
    </tr>
	  <?php }} ?>
  </tbody>
</table>
<?php include("../includes/footer.php"); ?>

</body>
</html>