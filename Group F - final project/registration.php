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
    $error_message = "";$success_message = "";

    // Register user
    if(isset($_POST['btnsignup'])){
       $username = trim($_POST['username']);
       $aptNumber = trim($_POST['aptNumber']);
       $password = trim($_POST['password']);
       $confirmpassword = trim($_POST['confirmpassword']);

       $isValid = true;

       // Check fields are empty or not
       if($username == '' || $aptNumber == '' || $password == '' || $confirmpassword == ''){
         $isValid = false;
         $error_message = "Please fill all fields.";
       }

       // Check if confirm password matching or not
       if($isValid && ($password != $confirmpassword) ){
         $isValid = false;
         $error_message = "Confirm password not matching";
       }

       // Check if Email-ID is valid or not
       // if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
       //   $isValid = false;
       //   $error_message = "Invalid Email-ID.";
       // }

       if($isValid){

         // Check if Email-ID already exists
         $stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND aptNumber = ?");
         $stmt->bind_param("ss", $username, $aptNumber);
         $stmt->execute();
         $result = $stmt->get_result();
         $stmt->close();
         if($result->num_rows > 0){
           $isValid = false;
           $error_message = "User already existed.";
         }

       }

       // Insert records
       if($isValid){
         $insertSQL = "INSERT INTO users(username,aptNumber,password ) values(?,?,?)";
         $stmt = $con->prepare($insertSQL);
         $stmt->bind_param("sss",$username,$aptNumber,$password);
         $stmt->execute();
         $stmt->close();

         $success_message = "Account created successfully. Click on the login link to be redirected.";
       }
    }
    ?>

  </head>
  <body>
    <div class='container'>
      <div class='row'>

        <div class='col-md-6' >

          <form method='post' action=''>

            <h1>Registration</h1>
            <?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?><a href="login.php">login</a>
            </div>

            <?php
            }
            ?>

            <div class="form-group">
              <label for="fname">Username:</label>
              <input type="text" class="form-control" name="username" id="username" required="required" maxlength="10" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="lname">Apt Number:</label>
              <input type="text" class="form-control" name="aptNumber" id="aptNumber" required="required" maxlength="3" placeholder="Apt Number">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" maxlength="80" placeholder="Confirm Password">
            </div>

            <button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
            <br><br>
            <p>Already have an account? Click <a href="login.php">Here</a> to login.</p>
          </form>
        </div>

     </div>
    </div>
  </body>
</html>