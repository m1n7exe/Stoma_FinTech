
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stoma - Sustainable Payment System</title>
    <style>
    /* Preheader Section (Top-right corner for login and signup buttons) */
    .preheader {
        position: absolute;
        top: 20px; /* Distance from top */
        right: 20px; /* Distance from right */
        z-index: 1; /* Ensure it's above the video */
        display: flex;
        gap: 10px; /* Space between buttons */
    }

    .preheader .btn {
        background-color: rgba(144, 238, 144, 0.4); /* Semi-transparent green background */
        color: white;
        padding: 8px 16px; /* Smaller padding to make the button more sleek */
        border: 1px solid rgba(144, 238, 144, 0.6); /* Light green border */
        border-radius: 15px; /* Rounded edges for a sleeker look */
        font-size: 0.9rem; /* Smaller text size */
        font-weight: 500; /* Slightly bold text */
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .preheader .btn:hover {
        background-color: rgba(144, 238, 144, 0.6); /* Slightly darker green on hover */
        border-color: rgba(144, 238, 144, 0.8); /* Darker border color on hover */
    }
    </style>
</head>

<body>
    <!-- Preheader with Login and Sign Up Buttons -->
    <div class="preheader">
        <a href="login.php" class="btn">Login</a>
        <a href="login.php" class="btn">Sign Up</a>
    </div>
</body>
</html>
