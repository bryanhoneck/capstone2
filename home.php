<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

require_once "config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Transerve Student/Faculty View</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
		<div class="login-form">
            <form action="" method="post">
                <h2 class="text-center">Enter Hours</h2>
                <div id="logo">
                    <img src="Ouachita_Baptist_University_seal.png" alt="OBU Logo">   
                </div>         
                <div class="form-group">
                    <input type="text" class="form-control" name="hours" placeholder="Enter Hours" required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="organization" placeholder="Organization" required="required">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Submit Hours</button>              
            </form>  
        </div>

		<?php
		$useremail= $_SESSION['name'];
			if(array_key_exists("hours", $_POST) && array_key_exists("organization", $_POST)){
				
				$hours = $_POST['hours'];
				$organization = $_POST['organization'];
				
				$sql = "INSERT INTO user_hour_form (user_email, hours, organization)
				VALUES ('$useremail', '$hours', '$organization')";
				if ($conn->query($sql) === TRUE) {
					echo "Hours added successfully :)";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				//$conn->close();
			}
		?>

		<table>
			<tbody>
				<tr>
					<th width = "80" style="text-align: center;">
						Hours
					</th>
					<th width = "130" style="text-align: center;">
						Organization
					</th>
					<th width = "180" style="text-align: center;">
						Date
					</th>
				</tr>
				<?php 
					$sql2 = "SELECT hours, organization, DATE_FORMAT(date, '%m/%d/%Y') AS date FROM user_hour_form WHERE user_email LIKE '%{$useremail}%'";
					$result = $conn->query($sql2);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						  echo "<tr><td>". $row["hours"]."</td><td>".$row["organization"]."</td><td>".$row["date"]."</td></tr>";
						}
					  } else {
						echo "0 results";
					  }
					  $conn->close();?>
			</tbody>
		</table>
		<br><br>
	</body>
</html>

