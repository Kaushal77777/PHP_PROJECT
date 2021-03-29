<?php 
    require_once("connection.php"); 
    if(isset($_SESSION["is_login"]) && $_SESSION['is_login'] == true ) 
    { 
        header("Location: index.php"); 
    }
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
            <h4> Login </h4> 
            <hr>
        </header>
        <main>
            <form action="" method="POST">
                <lable>Username:</lable>
                <input type="text" name="username" required/>
                <lable>Enter Password:</lable>
                <input type="password" name="password" required/>
                <input type="submit" name="login" value="Login"/>
                Or
                <a href="registration.php">Register</a>
            </form>
        <main>
        <footer>
            <?php
                try
                {
                    if(isset($_POST['login']))
                    {
                        $username=$_POST["username"];
                        $password=$_POST["password"];
                        $stmt = $dbhandler->prepare("
                            SELECT * FROM table_user 
                            WHERE username=:username 
                            AND password=:password 
                            LIMIT 1
                        ");
                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':password', $password);
                        $stmt->execute();
                        $row = $stmt->fetch();
                        if($row)
                        {
                            $id = $row['id'];
                            $role = $row['role'];
                            $name = $row['name'];
                            $rate = $row['rate'];
                            $_SESSION["is_login"] = true;
                            $_SESSION["session_id"] = $id;
                            $_SESSION["session_role"] = $role;
                            $_SESSION["session_name"] = $name;
                            $_SESSION["session_rate"] = $rate;
                            header("Location: index.php"); 
                            exit();
                        } 
                        else 
                        {
                            echo "Invalid Credentials";
                        }
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