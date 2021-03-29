<?php 
    require_once("connection.php") ;
    if(!isset($_SESSION["is_login"]) || $_SESSION['is_login'] != true ) 
	{ 
		header("Location: login.php"); 
	} 
    if(isset($_REQUEST['id']))
    {
    	$id = $_REQUEST['id'];
    	$name = $_REQUEST['name'];
    	$rate = $_REQUEST['rate'];
    } 
    // else if($_SESSION['role'] = 1)
    // {
    // 	$id = $_SESSION['session_id'];
    // 	$name = $_SESSION['session_name'];
    // 	$rate = $_SESSION['session_rate'];
    // }
    
?>

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
        		<a href="index.php">Home</a>
				<a href="logout.php">Log Out</a>
			</nav>
        	Add Ledger for <b> <?php echo $name ?> </b> 
            <hr>
        </header>
        <main>
        	<?php
	        	if(!isset($id)){
			    	echo "Please Select User <a href='index.php'>HOME</a>";
			    } else {
			?>
				<form action="" method="POST">
	                <lable>Date:</lable>
	                <input type="date" name="o_date" required/>
	                <lable>Quantity:</lable>
	                <input type="number" name="qty" required/>
	                <input type="submit" name="submit" value="Submit"/>
	            </form>
			<?php
			    }
		    ?>
            
        <main>
        <footer>
            <?php 
                try
                {
                    if(isset($_POST['submit']))
                    {
                        $o_date=$_POST["o_date"];
                        $qty=$_POST["qty"];
                        $stmt = $dbhandler->prepare("
                            INSERT INTO table_ledger (user_id, o_date, qty, rate) 
                            VALUES (:user_id, :o_date, :qty, :rate)
                        ");
                        $stmt->bindParam(':user_id', $id);
                        $stmt->bindParam(':o_date', $o_date);
                        $stmt->bindParam(':qty', $qty);
                        $stmt->bindParam(':rate', $rate);
                        $stmt->execute();
                        echo header("Location: view_ledger.php?id=".$id."&name=".$name."&rate=".$rate);
                    }
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                    die();
                }
            ?>

        </footer>
	</body>
</html>

<?php

    
    
?>