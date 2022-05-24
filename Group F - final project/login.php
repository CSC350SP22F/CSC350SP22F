<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   
    <!-- Registration logic -->
    <?php 
    if(isset($_POST['but_submit'])){

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($username != "" && $password != ""){

        $sql_query = "select count(*) as id from users where username='".$username."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['id'];

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: index.php');
        }else{
            echo "Invalid username and password";
        }

    }
    }
    ?>

  </head>
  <body>
    <div class='container'>
      <div class='row'>

        <div class='col-md-6' >

          <form method='post' action=''>

            <h1>Log In</h1>

            <div class="form-group">
              <input type="text" class="textbox" id="username" name="username" placeholder="Username" maxlength="10" />
            </div>
           <!--  <div class="form-group">
              <label for="lname">Apt Number:</label>
              <input type="text" class="form-control" name="aptNumber" id="aptNumber" required="required" maxlength="3">
            </div> -->
            <div class="form-group">
              <input type="password" class="textbox" id="password" name="password" placeholder="Password" maxlength="80" />
            </div>

            <input type="submit" value="Submit" name="but_submit" id="but_submit" />
            <br><br>
            <p>Don't have an account? Click <a href="registration.php">Here</a> to register.</p>
          </form>
        </div>

     </div>
    </div>
  </body>
</html>