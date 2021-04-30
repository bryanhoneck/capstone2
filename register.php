<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet"  href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <meta charset="utf-8" />
    </head>
    <body>
        
        <div class="login-form">
            <form action="" method="post">
                <h2 class="text-center">Create Account</h2>
                <div id="logo">
                    <img src="Ouachita_Baptist_University_seal.png" alt="OBU Logo">   
                </div>         
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="OBU Email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="repassword" placeholder="Re-type Password" required="required">
                </div>
                <div class="form-group">
                    <select name="usertype" id="usertype">
                        <option value="student">Student</option>
                        <option value="faculty">Faculty</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>              
            </form>  
            <p class="text-center"> Already User? <a href="index.html"> Login</a></p>
        </div>
 
        <?php
        //require_once "../config.php";

        if(isset($_POST['username'])){
            $uname = $_POST['username'];
            $upass = $_POST['password'];
            $urpass = $_POST['repassword'];
            $usertype = $_POST['usertype'];
            if($urpass==$upass){
                $pass_hash = password_hash($upass, PASSWORD_DEFAULT);
                //connect with database
                $conn = new mysqli('localhost','root','','transerve');
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "INSERT INTO accounts (user_email, password, user_type)
                        VALUES ('$uname', '$pass_hash', '$usertype')";
                if ($conn->query($sql) === TRUE) {
                    echo "Account successfully created.";
                    sleep(3);
                    header('Location: index.html');
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                $conn->close();
            }	
        }
        ?>
    </body>
</html>