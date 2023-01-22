<html>

	<body>
		<!-- CSS style -->
		<style>
			
			
label.header {
  background-color: #F1F1F1;
  text-align: center;
  padding: 20px;
 
}
</style>
<!-- creating labels for header  -->
<label class="header">
	Owner Details:-
</label>
<br>

<br>
<br>
<?php 
//connection to database
include './connection.php';
//getting pressed owner name from welcome page
if (isset($_REQUEST['owner_name']) && $_REQUEST['owner_name']!='') {
	$name = $_REQUEST['owner_name'];
	//if owner is not find
}else{
	die('Owner not found');
}
//query for owner details
 //owner count========================
$query = "SELECT * FROM `owners` WHERE name='$name'";
$con = $conn->query($query);
$table = mysqli_fetch_array($con);

//print_r($data);

?>
	<div class="nav">
			<!-- printing owner details in a lable -->
					
					<li>Name: <?php echo $table['name']?></li>
					<li>Email: <a href="mailto: <?php echo $table ['email']?>"><?php echo $table ['email']?></a></td></li>
					<li>Phone: <?php echo $table['phone']?></li>
					<li>Adress: <?php echo $table['address']?></li>
</div>
</body>
</html>