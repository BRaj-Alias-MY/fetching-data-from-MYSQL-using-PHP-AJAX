<!DOCTYPE html>
<html>
<head>
<script>
function showState(str) {
  if (str=="") {
    document.getElementById("loadStates").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("loadStates").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getstate.php?countryId="+str,true);
  xmlhttp.send();
}

//show city function 
function showCity(str) {
  if (str=="") {
    document.getElementById("loadCities").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("loadCities").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getcity.php?stateId="+str,true);
  xmlhttp.send();
}
</script>
<!--basic style-->
<style>
select 
{
	width:300px;
	height:30px;
	margin-bottom:20px;
}
</style>
</head>
<body>

<form>
<!--countries-->
<select name="users" onchange="showState(this.value)">
<option value="">Select a Country:</option>
 <?php 
 require('dbconfig.php');
 $sql = "select * from countries";
 $result = mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($result))
 {
	 echo "<option value='".$row[0]."'>". $row[1]. "</option>";
	 
 }
 ?>
</select>

 <br>
<!--states-->
<select id="loadStates" onchange="showCity(this.value)">
<option value="">Select a State:</option>

</select>
<br>

 
<!--cities-->
<select id="loadCities">
<option value="">Select a City:</option>

</select>

</form>

</body>
</html>