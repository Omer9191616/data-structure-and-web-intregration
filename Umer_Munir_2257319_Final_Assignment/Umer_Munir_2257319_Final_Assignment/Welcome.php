<html>
<?php
//connection to database
include './connection.php';




//query
$sql = $conn->query("SELECT Count(id) as NumOfOwner from owners");
//getting result
$result = mysqli_fetch_assoc($sql);
 
  // Return the number of rows in result set
  $owner=$result["NumOfOwner"];
 

//query

$sql1 = $conn->query("SELECT Count(id) as NumOfdogs from dogs");
//getting result
$R2 = mysqli_fetch_assoc($sql1);
 
  // Return the number of rows in result set
  $dog=$R2["NumOfdogs"];

  // Free result set
  
  $sql="SELECT id from events";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $events=mysqli_num_rows($result);
  
  // Free result set
  mysqli_free_result($result);
  }
mysqli_close($conn);
//html syntax
?>
<h1>
  <!-- css style -->
<style>
   p.normal {
       font-weight: normal;
     }
     
     p.light {
       font-weight: lighter;
     }
     
     p.thick {
       font-weight: bold;
     }
     
     p.thicker {
       font-weight: 900;
     }
     i.size {
       font: size 60px;
    }
   h1{
      text-align: center;
    }
   h2{
    text-align: center;
    font: size 40px;
    color: green;
   
   }
     </style>

    <i class="size">
      <br>
      <br>
   <?php
   //printing first header
   //printing the required statement 
   echo '"Welcome to Poppleton Dog Show!" ' 
   ?>
<br>
<br>
   <?php
   //printing the required statement
    echo '"This year ', $owner  ,' owners entered ', $dog ,  ' dogs in ' , $events,
' events!"';




?>
</i>
<br>
  </h1>

<h2>
<br>
  

  TOP 10 DOGS 
  
  
</h2>
</head>
<body>
<br>


  <?php
 //connection 
 include './connection.php';
 ?>
 <!-- creating table -->
<table>
<tr>
  <!-- Header Of Table -->
<th>No.</th>
 <th>Dog_Name</th> 
 <th>Breed_Name</th>
 <th>Average_Score</th>
 <th>Owner_name</th> 
 <th>Owner_email</th>
 </tr>
 <?php
 //query for top ten dogs
$query = $conn->query("SELECT dogs.name AS Dog_Name,breeds.name As Breed_Name,AVG(score) AS Average_Score,owners.name AS owner_name,owners.email as Owner_email
 from dogs INNER JOIn breeds
 on dogs.breed_id=breeds.id INNER JOIN entries
 on dogs.id=entries.dog_id INNER JOIN owners on owners.id=dogs.owner_id
    
    Group by dog_id HAVING COUNT(competition_id)>1   ORDER BY AVG(score) DESC LIMIT 10");
    //$result=mysqli_query($conn,$query);
    //setting variable for number of rows
$number=1;
//printing table
while($row = mysqli_fetch_assoc($query))
{
  ?>
   <tr>
   <td><?php echo $number++?></td>
    <td><?php echo $row["Dog_Name"]?></td>
    <td><?php echo $row ['Breed_Name']?></td>
    <td><?php echo $row ['Average_Score']?></td>
    <td><a href= "owner.php?owner_name=<?php echo $row ['owner_name']?>"><?php echo $row ['owner_name']?></a></td>
    <td><a href="mailto: <?php echo $row ['Owner_email']?>"><?php echo $row ['Owner_email']?></a></td>
    <tr>
    <?php
}?>
<!-- Ending of Table -->
</table>
 
		
    <br>
    <br>
 
				
		
	





</body>
</html>
<!-- end of html doc-->