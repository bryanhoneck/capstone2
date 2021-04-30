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
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="form-group">
                        <select name="usertype" id="usertype">
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="classification" id="classification">
                            <option value="" disabled selected>Select Year</option>
                            <option value="freshman">Freshman</option>
                            <option value="sophomore">Sophomore</option>
                            <option value="junior">Junior</option>
                            <option value="senior">Senior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="school" id="school">
                            <option value="" disabled selected>Select School</option>
                            <option value="natsci">Natural Sciences</option>
                            <option value="socsci">Social Sciences</option>
                            <option value="ed">Education</option>
                            <option value="christstud">Christian Studies</option>
                            <option value="human">Humanities</option>
                            <option value="fina">Fine Arts</option>
                            <option value="bus">Business</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>              
            </form>  
            <p class="text-center"> Already User? <a href="index.html"> Login</a></p>
        </div>
 
        <?php
        

        if(isset($_POST['username'])){
            $uname = $_POST['username'];
            $upass = $_POST['password'];
            $urpass = $_POST['repassword'];
            $usertype = $_POST['usertype'];
            $classification = $_POST['classification'];
            $school = $_POST['school'];
            if($urpass==$upass){
                $pass_hash = password_hash($upass, PASSWORD_DEFAULT);
                require_once "config.php";
                $sql = "INSERT INTO accounts (user_email, password, classification, school, user_type)
                        VALUES ('$uname', '$pass_hash', '$classification', '$school', '$usertype')";
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