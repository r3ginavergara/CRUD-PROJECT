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
    <title>Home</title>
</head>
<body>

<div class="nav">
        <div class="logo">
            
        <p>  <a href="Home.php"><img src="agila.png" alt="Agila"/></a> CLUB MEMBERS </p> 
            
        </div>
        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM dtbl WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Course = $result['Course'];
                $res_Club = $result['Club'];
                $res_Section = $result['Section'];
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
                $res_password = $result['Password'];
            }
            
            echo "<a href='edit.php?Id=$res_id'> </a>";
            ?>
            <a href="edit.php"> <button class="btn">Edit Profile</button> </a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
            

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
          
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your section is <b><?php echo $res_Section ?></b>.</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
          <div class="box">
                <p>Your Password is <b><?php echo $res_password ?></b>.</p>
            </div>
          <div class="box">
                <p>Your Club is <b><?php echo $res_Club ?></b>.</p>
            </div>
            <div class="box">
                <p>Your Course is <b><?php echo $res_Course ?></b>.</p>
            </div>
            <div class="box">
                <p>And you are <b><?php echo $res_Age ?> years old</b>.</p> 
            </div>
            
            
          </div>
       </div>

    </main>
</body>
</html>