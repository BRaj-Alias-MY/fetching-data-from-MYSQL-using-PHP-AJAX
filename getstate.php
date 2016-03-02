<?php
$countryId = intval($_GET['countryId']);
include('dbconfig.php');
$sql="SELECT * FROM states WHERE countryId = '".$countryId."'";
$result = mysqli_query($con,$sql);
 
while($row = mysqli_fetch_array($result)) {
   echo "<option value='".$row[0]."'>". $row[1]. "</option>";
}
 
mysqli_close($con);
?>
