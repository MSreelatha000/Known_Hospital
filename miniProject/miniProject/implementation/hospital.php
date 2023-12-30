<?php


	$con = mysqli_connect('localhost', 'root', '', 'login_db1');
  
	$tableContent ='';
 	 $start='';
 	 
 	
	$selectStmt = $con->prepare('SELECT * FROM staffs WHERE hospital_name LIKE :start OR address LIKE :start OR specalist_1 like :start OR specalist_2 like :start OR specalist_3 like:start OR doctor_availability like :start OR appointment lke :start OR beds like :start ');
	//$selectStmt->bind_param('s', $_GET[':start']);
	$selectStmt->execute();
	$users =$selectStmt->fetchAll();
	foreach ($users as $user)
	{
		$tableContent=$tableContent.'<tr>'.
			'<td>'.$user['hospital_name'].'</td>'
			.'<td>'.$user['address'].'</td>'
			.'<td>'.$user['specalist_1'].'</td>'
			.'<td>'.$user['specalist_2'].'</td>'
			.'<td>'.$user['specalist_3'].'</td>'
			.'<td>'.$user['doctor_availability'].'</td>'
			.'<td>'.$user['appointment'].'</td>'
			.'<td>'.$user['beds'].'</td>';

  }

  if(isset($_post['search'])){
    $start=$_post['start'];
    $tableContent ='';
    $selectStmt=$con->prepare('SELECT * FROM staffs WHERE hospital_name LIKE :start OR address LIKE :start OR specalist_1 like :start OR specalist_2 like :start OR specalist_3 like:start OR doctor_availability like :start OR appointment lke :start OR beds like :start ');
    $selectStmt->execute(array(
      ':start'=>$start

    ));
    $users =$selectStmt->fetchAll();
    foreach ($users as $user)
    {
      $tableContent=$tableContent.'<tr>'.
      '<td>'.$user['hospital_name'].'</td>'
      .'<td>'.$user['address'].'</td>'
      .'<td>'.$user['specalist_1'].'</td>'
      .'<td>'.$user['specalist_2'].'</td>'
      .'<td>'.$user['specalist_3'].'</td>'
      .'<td>'.$user['doctor_availability'].'</td>'
      .'<td>'.$user['appointment'].'</td>'
      .'<td>'.$user['beds'].'</td>';

  }


  }



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
		<input type="text" name="start" placeholder="search here...."><br><br>
		<input type="submit" name="search" value="filter"><br><br>

		<table>
			<tr>
				
				<td>hospital name</td>
				<td>Address</td>
				<td>Specalist_1</td>
				<td>Specalist_2</td>
				<td>Specalist_3</td>
				<td>Doctor Availability</td>
				<td>Appoinments Fixed</td>
				<td>Beds Availability</td>
				
			</tr>
			
			<?php
				echo $tableContent;
			?>

			
		</table>
	</form>
</body>
</html>
