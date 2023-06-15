<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $section = $_POST['section'];
            $club = $_POST['club'];
            $course = $_POST['course'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM dtbl WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO dtbl(Username,Email,Age,Password,Section,Club,Course) VALUES('$username','$email','$age','$password','$section', '$club', '$course')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <header>CLUB MEMBERSHIP FORM</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Full Name</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="section">Section</label>
                    <input type="text" name="section" id="section" autocomplete="off" required>
                </div>


                <div class="field input">
                    <label for="club">Club</label>
                    <input type="text" name="club" id="club" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="course">Course</label>
                    <select name ="course" class="field input">
                        <option value =""> Select Course </Option>
                        <option value="Bachelor of Elementary Education"> Bachelor of Elementary Education </option>
                        <option value="Bachelor of Secondary Education"> Bachelor of Secondary Education </option>
                        <option value="BS Business Management"> BS Business Management </option>
                        <option value="BS Computer Science"> BS Computer Science </option>
                        <option value="BS Hospitality Management"> BS Hospitality Management </option>
                        <option value="BS Information Technology"> BS Information Technology </option>
                        <option value="BS Psychology"> BS Psychology </option>
                        <option value="BS Tourism Management"> BS Tourism Management </option>
                </div>



                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>