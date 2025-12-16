<?php

if (isset($_POST["regbtn"])) {

    // 1. connect to database
    include("dbconnect.php");

    // 2. get the info from the form
    $fn   = $_POST["fullname"];
    $eid  = $_POST["email"];
    $pwd  = $_POST["password"];
    $cn   = $_POST["contact"];      // note: input name="contact" 
    $gn   = $_POST["gender"];
    $city = $_POST["city"];

    // 3. write query
    $qry = "INSERT INTO users(fullname, email, password, contact, gender, city)
            VALUES('$fn', '$eid', '$pwd', '$cn', '$gn', '$city')";

    // 4. execute the query
    $result = mysqli_query($con, $qry);

    // 5. print acknowledgement
    if ($result) {
        echo "<script>alert('registration successfull');</script>";
    } else {
        echo "<script>alert('something went wrong');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="reg-box">
        <h3 class="text-center mb-4">Registration Form</h3>

        <form method="post">
            <!-- Fullname -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>

            <!-- Contact -->
            <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number" required>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label>Gender</label><br>
                <label><input type="radio" name="gender" value="Male"> Male</label>
                <label class="ml-3"><input type="radio" name="gender" value="Female"> Female</label>
            </div>

            <!-- City -->
            <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control">
                    <option value="">Select City</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Pune">Pune</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Submit -->
            <button type="submit" name="regbtn" class="btn btn-primary btn-block">
                Register
            </button>
        </form>
    </div>
</div>

</body>
</html>
