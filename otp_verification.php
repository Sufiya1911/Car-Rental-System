<?php
session_start();

// Check if OTP form is submitted
if(isset($_POST['verify_otp'])) {
    $otp_entered = $_POST['otp'];

    // Check if OTP entered by the user matches the stored OTP
    if($otp_entered == $_SESSION['otp']) {
        // OTP verification successful, proceed with login
        // You can redirect the user to the dashboard or any other page
        header("location: dashboard.php");
        exit();
    } else {
        // Invalid OTP, display error message
        $error = "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Add your CSS file link here -->
</head>
<body>
    <div class="container">
        <h2>OTP Verification</h2>
        <form method="POST">
            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" class="form-control" required>
            </div>
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <button type="submit" name="verify_otp" class="btn btn-primary">Verify OTP</button>
        </form>
    </div>
</body>
</html>
