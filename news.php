<?php
session_start();

include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainability News</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #f4a261;
            padding: 15px 20px;
            color: white;
            text-align: center; /* Center-aligns the content */
            display: flex;
            flex-direction: column; /* Stacks the elements vertically */
            justify-content: center; /* Centers the items vertically */
            align-items: center; /* Centers the items horizontally */
            margin-top: 60px;
        }

        header h1 {
            font-size: 2rem; /* Adjust size if necessary */
            margin-bottom: 10px; /* Space between the title and the search bar */
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; /* Adds spacing between input and button */
        }

        nav input[type="text"] {
            padding: 8px;
            width: 300px; /* Adjust the width of the search bar */
            border-radius: 20px;
            border: none;
        }

        nav button {
            background-color: #e76f51;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .container {
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .hero {
            position: relative;
            height: 300px; /* Adjust based on your needs */
            border-radius: 8px;
            overflow: hidden; /* Ensures content stays inside the borders */
            display: flex;
            align-items: flex-end; /* Align the hero-content to the bottom */
        }
        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Keeps the aspect ratio and covers the div */
            border-radius: inherit; /* Matches the border-radius of the container */
        }

        .hero-content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: black;
            padding: 15px;
            border-radius: 8px;
            z-index: 1;
        }

        .hero-content h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 1rem;
        }

        .articles h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            border-bottom: 2px solid #f4a261;
            padding-bottom: 10px;
        }

        .article-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            flex: 1;
            min-width: 250px;
            text-align: center;
            position: relative;
        }

        .article-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .article-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #f4a261;
        }

        .article-card p {
            font-size: 0.9rem;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f4a261;
            color: white;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            nav input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }

            header {
                flex-direction: column;
            }

            .hero {
                height: 200px;
            }
        }
    </style>
</head>
<body>

    <!-- Header with Search Bar -->

    <header>
    <h1>Sustainability News</h1>
    <nav>
        <input type="text" id="search-input" placeholder="Search articles...">
        <button onclick="searchArticles()">Search</button>
    </nav>
    </header>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-content">
            <img src="assets/news_articles_pictures/forestrestoration.jpg" alt="Forest Restoration" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;" 
                <h2>Featured: Forest Restoration Efforts</h2>
                <p>Discover how communities are coming together to restore vital forests.</p>
            </div>
        </div>

        <!-- Top Recent Articles -->
        <div class="articles">
            <h2>Top Recent Articles</h2>
            <div class="article-list">
                <a href="article1.php" class="article-card">
                    <img src="assets/news_articles_pictures/solarpower.jpg" alt="Solar Energy Innovations">
                    <h3>Solar Energy Innovations</h3>
                    <p>New breakthroughs in solar technology promise a greener future.</p>
                </a>
                <a href="urban-farming-success-stories.html" class="article-card">
                    <img src="assets/news_articles_pictures/wheat.jpg" alt="Urban Farming Success Stories">
                    <h3>Urban Farming Success Stories</h3>
                    <p>How cities are growing fresh produce in surprising places.</p>
                </a>
                <a href="reducing-plastic-waste.html" class="article-card">
                    <img src="assets/news_articles_pictures/bottle.jpg" alt="Reducing Plastic Waste">
                    <h3>Reducing Plastic Waste</h3>
                    <p>Simple steps to reduce plastic consumption in daily life.</p>
                </a>
            </div>
        </div>

        <!-- Community Articles -->
        <div class="articles" style="margin-top: 40px;">
            <h2>Community Articles</h2>
            <p>Use the search bar above to explore articles contributed by our community members.</p>
        </div>

    </div>

    <footer>
        &copy; 2024 Sustainability News. All Rights Reserved.
    </footer>

    <script>
        function searchArticles() {
            const query = document.getElementById('search-input').value.trim();
            if (query) {
                alert(`Searching for articles related to "${query}"...`);
                // You can replace this alert with actual search functionality.
            } else {
                alert('Please enter a search term.');
            }
        }
    </script>

</body>
</html>
