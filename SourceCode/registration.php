<?php 
    require_once("connection.php") ;
    if(isset($_SESSION["is_login"]) && $_SESSION['is_login'] == true ) 
    { 
        header("Location: index.php"); 
    }
    
?>
<?php
    if(isset($_REQUEST['message']))
    {
        echo $_REQUEST["message"];
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
            <h4> Registration </h4> 
            <hr>
        </header>
        <main>
            <form action="" method="POST">
                <lable>Name:</lable>
                <input type="text" name="name" required/>
                <lable>Username:</lable>
                <input type="text" name="username" required/>
                <lable>Enter Password:</lable>
                <input type="password" name="password" required/>
                <lable>Email:</lable>
                <input type="email" name="email" required/>
                <lable>Mobile:</lable>
                <input type="text" name="mobile" required/>
                <lable>Address:</lable>
                <input type="text" name="address" required/>
                <p>
                    Role:
                    <lable>
                        <input type="radio" name="role" id="admin" value="0" />
                        Admin
                    </lable>
                    <lable>
                        <input type="radio" name="role" id="user" value="1" />
                        User
                    </lable>
                </p>
                <lable>Rate:</lable>
                <input type="number" name="rate" required/>
                <input type="submit" name="submit" value="Register"/>
                Or
                <a href="login.php">Login</a>
            </form>
        <main>
        <footer>
            <?php 
                try
                {
                    if(isset($_POST['submit']))
                    {
                        $name=$_POST["name"];
                        $username=$_POST["username"];
                        $password=$_POST["password"];
                        $email=$_POST["email"];
                        $mobile=$_POST["mobile"];
                        $address=$_POST["address"];
                        $role=$_POST["role"];
                        $rate=$_POST["rate"];
                        $stmt = $dbhandler->prepare("
                                                    SELECT * FROM table_user 
                                                    WHERE username=:username 
                                                    LIMIT 1
                        ");
                        $stmt->bindParam(':username', $username);
                        $stmt->execute();
                        $row = $stmt->fetch();
                        if($row)
                        {
                            header("Location: registration.php?message=Username Already Taken Please Resubmit Form");
                        }
                        else{
                            $stmt = $dbhandler->prepare("
                                INSERT INTO table_user (name, username, password, email, mobile, address, role, rate) 
                                VALUES (:name, :username, :password, :email, :mobile, :address, :role, :rate)
                            ");
                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':username', $username);
                            $stmt->bindParam(':password', $password);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':mobile', $mobile);
                            $stmt->bindParam(':address', $address);
                            $stmt->bindParam(':role', $role);
                            $stmt->bindParam(':rate', $rate);
                            $stmt->execute();
                            echo "<br><br>";
                            //echo "You are registered Now you can login ";
                            header("Location: registration.php?message=You are registered Now you can login ");
                            echo "<a href='login.php'>Login</a>";
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

<?php

    
    
?>