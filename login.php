<?php 
// Start the session (if needed)
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded credentials
    $valid_username = "kahwee";
    $valid_password = "password"; // In a real-world scenario, passwords should be hashed

    // Get user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials are correct
    if ($username === $valid_username && $password === $valid_password) {
        // Successful login
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: pre-quiz.php"); // Redirect to a dashboard page after login
        exit();
    } else {
        // Incorrect credentials
        $error_message = "Invalid username or password.";
    }
}

// Include the header
// include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your external CSS file here -->
    <style>
        /* Fullscreen background video */
        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Container for the sign-in form */
        .sign-in-container {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            color: white;
        }

        /* Sign-in form styling */

        .sign-in-form {
            background-color: rgba(144, 238, 144, 0.5); /* Light green background with some transparency */
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 320px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
}


        .form-input {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            width: 100%;
            padding: 8px; /* Smaller padding for compact inputs */
            margin: 10px 0; /* Space between inputs */
            border: 1px solid #9acd32; /* Light green border */
            border-radius: 6px;
            font-size: 14px; /* Smaller font size */
            color: #333;
            box-sizing: border-box; /* Ensures consistent sizing */
        }

        .form-button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-button:hover {
            background-color: #45a049;
        }

        /* Title and instructions */
        .title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .error-message {
            color: white;
            text-align: center;
            font-size: 1rem;
            margin-top: 15px;
        }
        

    </style>
</head>
<body>
    <!-- Video Background -->
    <video class="background-video" autoplay muted loop>
        <source src="assets/animated-scene.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Sign-In Form -->
    <div class="sign-in-container">
        <div class="sign-in-form">
            <h2 class="title">Welcome to Stoma</h2>
            <!-- <h4 class ="subtext"> Singapore's First Sustainable Payment System</h4> -->
            <!-- Show error message if credentials are incorrect -->
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form action="" method="POST">
                <input type="text" class="form-input" name="username" placeholder="Username" required>
                <input type="password" class="form-input" name="password" placeholder="Password" required>
                <button type="submit" class="form-button">Log In</button>
            </form>
        </div>
    </div>

    <div class = "stoma-info">
        <div
    </div>

<?php
// Include the footer
//include("footer.php");
?>
</body>
</html>
