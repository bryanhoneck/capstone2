<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="utf-8" />
    <title>Student Form</title>
  </head>
  <body>
    <a href="../index.html" class = "back">Back</a>
      <h1>Transerve Application Form</h1>
      <form action="student_entry.php">
          <label for="fname">First name:</label><br>
          <input type="text" id="fname" name="fname"><br>
          <label for="lname">Last name:</label><br>
          <input type="text" id="lname" name="lname"><br>
          <label for="studentID">Student ID:</label><br>
          <input type="text" id="studentID" name="studentID"><br>
          <label for="box">Hours:</label><br>
          <input type="text" id="hours" name="hours"><br>
          <label for="class">Classification:</label><br>
          <select name="class" id="class">
              <option value="fr">Freshman</option>
              <option value="sp">Sophomore</option>
              <option value="jr">Junior</option>
              <option value="sr">Senior</option>
          </select><br>
          <!-- <label for="date">Semester and Year you're registering for:</label><br> -->
          <!-- <input type="text" id="date" name="date"> -->
          <input type="submit" value="Submit">
        </form>
  </body>
</html>
