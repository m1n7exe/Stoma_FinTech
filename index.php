<?php
include("pre-header.php"); // Include header for PHP functionality if necessary
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoma - Sustainable Payment System</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: rgba(144, 238, 144, 0.4) /* Fallback background color */
        }

        /* Background Video */
        .background-video {
            position: fixed; /* Keep it fixed to fill the viewport */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Push behind content */
        }

        /* Header Section */
        .hero-section {
            height: 100vh; /* Full viewport height for the intro section */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 4rem; /* Large title text */
            margin: 0;
            color: white;
        }


        /* Main Section Container */
        .stoma-info-container {
            display: flex;
            align-items: center;
            max-width: 1100px;
            margin: 30px auto;
            padding: 20px;
            background-color: rgba(255,255,255,1);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(144, 238, 144, 0.4);
        }

        /* Left Section: Image */
        .stoma-info-image {
            flex: 1;
            margin-right: 20px; /* Space between image and text */
        }

        .stoma-info-image img {
            width: 150%;
            height: auto;
            border-radius: 8px;
        }

        /* Right Section: Text */
        .stoma-info-content {
            flex: 1;
            padding: 20px;
        }

        .stoma-info-content h1 {
            font-size: 2rem;
            color: rgba(100, 200, 100, 1);
            margin-bottom: 20px;
        }

        .stoma-info-content p {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #333;
        }

        .stoma-info-content h2 {
            font-size: 1.2rem;
            color: rgba(100, 200, 100, 1);
        }

        .stoma-info-content ul {
            margin-top: 10px;
            margin-bottom: 20px;
            padding-left: 20px;
            list-style-type: disc;
            color:#333;
        }

        .stoma-info-content ul li {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        /* Call-to-action button */
        .cta-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: rgba(100, 200, 100, 1); /* Lime green */
            color: white;
            font-size: 0.8rem;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #28a428; /* Slightly darker green */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .stoma-info-container {
                flex-direction: column;
                text-align: center;
            }

            .stoma-info-image {
                margin: 0 0 20px 0;
            }

            .stoma-info-content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Background Video -->
    <video class="background-video" autoplay muted loop>
        <source src="assets/animated-scene.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Welcome to CO-PULSE</h1>
    </section>


    <main class="content-section">
        <div class="stoma-info-container">
            <!-- Left: Image -->
            <div class="stoma-info-image">
                <img src="assets/stoma-debit-card-removebg.png" alt="About Stoma" style="width:100%;border-radius:8px;">
            </div>
            <!-- Right: Text -->
            <div class="stoma-info-content">
                <h1>What is CoPulse?</h1>
                <p>
                    CoPulse is a modern financial platform dedicated to helping you manage your finances with ease, security, and flexibility. Our mission is to provide tools that empower individuals to achieve their financial goals.
                </p>
                <p>
                    With innovative features and a user-friendly experience, Stoma ensures that you have everything you need to make informed financial decisions.
                </p>
                <h2>Our Key Features:</h2>
                <ul>
                    <li>Real-time tracking of your transactions and balances.</li>
                    <li>Customized financial goals and budgeting tools.</li>
                    <li>Advanced security measures for your peace of mind.</li>
                    <li>Seamless integration with your favorite apps and services.</li>
                </ul>
                <a href="learn-more.html" class="cta-button">Learn More</a>
            </div>
        </div>
    </main>
</body>
</html>


