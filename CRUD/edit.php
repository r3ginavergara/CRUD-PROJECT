<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>
</head>
<body>

    <div class="nav">
        <div class="logo">
        <p>  <a href="Home.php"><img src="agila.png" alt="Agila"/></a> CLUB MEMBERS </p> 
        </div>

        <div class="right-links">
            <a href="#"> <button class="btn">Edit Profile</button> </a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $section = $_POST['section'];
                $club = $_POST['club'];
                $course = $_POST['course'];
                $password = $_POST['password'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE dtbl SET Username='$username', Email='$email', Age='$age', Section='$section', Club='$club', Course='$course', Password='$password' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM dtbl WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                    $res_Section = $result['Section'];
                    $res_Club = $result['Club'];
                    $res_Course = $result['Course'];
                    $res_Password = $result['Password'];
                }

            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="section">Section</label>
                    <input type="text" name="section" id="section" value="<?php echo $res_Section; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="club">Club</label>
                    <input type="text" name="club" id="club" value="<?php echo $res_Club; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" value="<?php echo $res_Password; ?>" autocomplete="off" required>
                </div>



                <div class="field input">
                    <label for="course">Course</label>
                    <select name ="course" class="field input" <?php echo $res_Course; ?>" autocomplete="off" required>
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
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>