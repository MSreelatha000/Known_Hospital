<?php
	$con=mysqli_connect('localhost','root','','login_db');



?>
<!DOCTYPE html>
<html>
<head>
	<title>Hospitals List</title>
	<style type="text/css">
		table,tr,td,th{
			border: 1px solid black;
		}
		td{
			background-color:#ddd;
		}
	</style>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="id" placeholder="search here...."><br><br>
		<input type="submit" name="search" value="SEARCH"><br><br>

		<table>
			<tr>
				
				<th>hospital name</th>
				<th>Address<</th>
				<th>Specalist_1</th>
				<th>Specalist_2</th>
				<th>Specalist_3</th>
				<th>Doctor Availability</th>
				<th>Appoinments Fixed</th>
				<th>Beds Availability</th>
				
			</tr>
			
			<?php
			if(isset($_GET['submit'])){
				$id=$_GET['id'];
				$sql="select* from staffs where hospital_name= $id";
				$result= mysql_query($sql);
				while($rows =mysql_fetch_array($result)){
			
			?>
			<tr>
			<td><?php echo $rows['hospital_name'];?></td>
		        <td><?php echo $rows['address'];?></td>
		        <td><?php echo $rows['specalist_1'];?></td>
		        <td><?php echo $rows['specalist_2'];?></td>
			<td><?php echo $rows['specalist_3'];?></td>
			<td><?php echo $rows['doctor_availability'];?></td>
		 	<td><?php echo $rows['appointment'];?></td>
			<td><?php echo $rows['beds'];?></td>
			<?php
			}
			}
			?>
			
			
			
	

			
		</table>
	</form>
</body>
</html>
