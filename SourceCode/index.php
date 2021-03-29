<?php 
	require_once("connection.php") ;
	if(!isset($_SESSION["is_login"]) || $_SESSION['is_login'] != true ) 
	{ 
		header("Location: login.php"); 
	} 
	else 
	{
		$id = $_SESSION['session_id'];
        $role = $_SESSION['session_role'];
        $name = $_SESSION['session_name'];
        $rate = $_SESSION['session_rate'];
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dairy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<header> 
		<nav>
			<a href="logout.php">Log Out</a>
		</nav>
		Welcome, <b><?php echo $name; ?> </b> 
		<hr>
	</header>
	<main>
		<?php 
			if($role == 0){
		?>
			<table>
	            <thead>
	              	<tr>
		                <th>Name</th>
		                <th>Email</th>
		                <th>Mobile</th>
		                <th>Address</th>
		                <th>View</th>
	              	</tr>
	            </thead>
            	<tbody>
            		<?php
            			$role = 1;
            			$stmt = $dbhandler->prepare("
            				SELECT * FROM table_user 
            				WHERE role=:role
            			");
            			$stmt->bindParam(':role', $role);
            			$stmt->execute();
            			$data = $stmt->fetchAll();
            			foreach ($data as $row) {
						    echo '<tr>';
						    	echo '<td>'.$row['name'].'</td>';
				                echo '<td>'.$row['email'].'</td>';
				                echo '<td>'.$row['mobile'].'</td>';
				                echo '<td>'.$row['address'].'</td>';
				                echo '<td>';
				                	echo '<a href="add_ledger.php?id='.$row['id'].'&name='.$row['name'].'&rate='.$row['rate'].'">Add</a> ';
				                	echo '<a href="view_ledger.php?id='.$row['id'].'&name='.$row['name'].'&rate='.$row['rate'].'">View</a> ';
				                echo '</td>';
						    echo '</tr>';
						}
            		?>
	            </tbody>
          	</table>
		<?php
			}
			else 
			{
				echo header("Location: view_ledger.php"); 
			}
		?>
	<main>
	<footer></footer>
</body>
</html>