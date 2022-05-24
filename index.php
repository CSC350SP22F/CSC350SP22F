<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>
<!doctype html>
<html>
    <head>
        <?php 
            $error_message = "";$success_message = "";
            if(isset($_POST['btnschedule'])){
                $timeSlot = trim($_POST['timeSlot']);
                $aptNumber = trim($_POST['aptNumber']);
                $isValid = true;
                if($isValid){
                 $insertSQL = "INSERT INTO schedules(aptNumber,timeSlot) values(?,?)";
                 $stmt = $con->prepare($insertSQL);
                 $stmt->bind_param("ss",$aptNumber,$timeSlot);
                 $stmt->execute();
                 $stmt->close();

                 $success_message = "Inserted";
                 header("Location: confirmation.php");
               }else{
                $error_message = "Error";
               }
            }
        ?>
        
    </head>
    <body>
        <h1>Homepage</h1>
        <form method='post' action="">
            <table border = "1">
               
                <tr>
                    <th colspan="9">Weekly Laundry Schedule</th>
                </tr>
                <div>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 12AM-3AM"      name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 12AM-3AM"     name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesd 12AM-3AM"     name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursda 12AM- AM"     name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 12AM-3AM"      name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturda 12AM-3AM"     name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 12AM-3AM"      name="timeSlot"/>12AM - 3AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 3AM-6AM"    name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 3AM-6AM"   name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 3AM-6AM" name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 3AM-6AM"  name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 3AM-6AM"    name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 3AM-6AM"  name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 3AM-6AM"    name="timeSlot"/>3AM - 6AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 6AM-9AM"     name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 6AM-9AM"    name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 6AM-9AM"  name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 6AM-9AM"   name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 6AM-9AM"     name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 6AM-9AM"   name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 6AM-9AM"     name="timeSlot"/>6AM - 9AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr> 
                    <tr>
                        <td><br><center><input type="radio" value="Monday 9AM-12PM"    name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 9AM-12PM"   name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 9AM-12PM" name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 9AM-12PM"  name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 9AM-12PM"    name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 9AM-12PM"  name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 9AM-12PM"    name="timeSlot"/>9AM - 12PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 12AM-3PM"   name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 12AM-3PM"  name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 12AM-3PM" name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 12AM-3PM" name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 12AM-3PM"   name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 12AM-3PM" name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 12AM-3PM"   name="timeSlot"/>12AM - 3PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 3PM-6PM"    name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 3PM-6PM"   name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 3PM-6PM" name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 3PM-6PM"  name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 3PM-6PM"    name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 3PM-6PM"  name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 3PM-6PM"    name="timeSlot"/>3PM - 6PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 6PM-9PM"    name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 6PM-9PM"   name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 6PM-9PM" name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 6PM-9PM"  name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 6PM-9PM"    name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 6PM-9PM"  name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 6PM-9PM"    name="timeSlot"/>6PM - 9PM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    <tr>
                        <td><br><center><input type="radio" value="Monday 9PM-12AM"    name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Tuesday 9PM-12AM"   name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Wednesday 9PM-12AM" name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Thursday 9PM-12AM"  name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Friday 9PM-12AM"    name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Saturday 9PM-12AM"  name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                        <td><br><center><input type="radio" value="Sunday 9PM-12AM"    name="timeSlot"/>9PM - 12AM</center><input type="text" name="aptNumber" placeholder="Apt number" maxlength="3"></td>
                    </tr>
                    
                </div>
                
            </table>
            <input type="submit" value="Submit" name="btnschedule">
            <input type="submit" value="Logout" name="but_logout">
        </form>
        
        
    </body>
</html>