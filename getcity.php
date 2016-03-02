<?php
$stateId = intval($_GET['stateId']);
include('dbconfig.php');
$sql="SELECT * FROM cities WHERE stateId = '".$stateId."'";
$result = mysqli_query($con,$sql);
 
while($row = mysqli_fetch_array($result)) {
   echo "<option value='".$row[0]."'>". $row[1]. "</option>";
}
 
mysqli_close($con);
?>
