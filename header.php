<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        /* Navbar styling */
        .navbar {
            /*background-color: rgba(144, 238, 144, 0.6); ; /* Dark background color */ */
            background-color: rgba(255, 255, 255, 0.6); ; /* Dark background color */
            padding: 10px 0; /* Add padding for spacing */
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; /* Ensure it stays on top */
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto; /* Center the navbar content */
            padding: 0 20px; /* Add some padding inside */
        }

        .logo {
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-links {
            list-style-type: none;
            display: flex;
            margin: 0;
        }

        .navbar-links li {
            margin-left: 20px;
        }

        .navbar-links li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-links li a:hover {
            background-color: rgba(255,255,255,0.25); /* Green background on hover */
            color: white; /* Change text color to white when hovering */
            border-radius: 4px; /* Optional: Add rounded corners on hover */
        }
        /* Optional: Adding responsive behavior for mobile */
        @media screen and (max-width: 768px) {
            .navbar-container {
                flex-direction: column;
                text-align: center;
            }

            .navbar-links {
                flex-direction: column;
                margin-top: 10px;
            }

            .navbar-links li {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="logo">STOMA</a>
            <ul class="navbar-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">Quiz</a></li>
                <li><a href="services.php">Carbon Calculator</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
