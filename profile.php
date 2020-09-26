
<?php
 include('session.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="assets/css/profile.css">
<body>
    
<a href="StudentWeb.php" > <input align ="center" type="submit" value="danh sách sinh viên" ></a>


<?php
$sql = "SELECT * FROM student where id = $loggedin_id";
$result = mysqli_query($con,$sql);

while($rows = mysqli_fetch_array($result)){
?>

    
<form action="" method="POST">
<div id="reg-head" class="headrg">THÔNG TIN SINH VIÊN</div>

<table border="0" align="center" cellpadding="2" cellspacing="0">
<td class="text-field"> <div align="left" >Mã SV:</div> </td>
<td class="text-field"><?php echo $rows['id']; ?></td>
</tr>
<td class="text-field"><div align="left" >Tài khoản:</div></td>
<td class="text-field"><?php echo $rows['username']; ?></td>
</tr>
<td class="text-field"><div align="left" >Tên SV:</div></td>
<td class="text-field"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></td>
</tr>
<td class="text-field"><div align="left" >Quê quán:</div></td>
<td class="text-field"><?php echo $rows['address']; ?></td>
</tr>
</table>
</form>
<div id="st"><a href="logout.php" id="st-btn">Sign Out</a></div>



    
    
<?php 
// close while loop 
}
?>

</body>
</html>