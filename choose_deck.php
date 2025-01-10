<?php

session_start();

include("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose Your Deck</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #ff9f00; /* Orange background */
      color: #fff; /* White text */
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    header h1 {
      font-family: 'Fredoka One', cursive;
      color: #fff; /* White text */
      font-size: 2rem;
      margin-bottom: 50px;
      text-align: center;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      width: 800px;
      max-width: 800px;
    }

    .grid-item {
      background-color: #ff6f00; /* Darker orange for grid items */
      color: #fff;
      font-size: 1.2rem;
      font-weight: 600;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      border-radius: 10px;
      transition: transform 0.3s, background-color 0.3s;
      aspect-ratio: 1 / 1; /* Ensures square dimensions */
    }

    .grid-item:hover {
      background-color: #ff8f00; /* Lighter orange for hover effect */
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .grid-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 480px) {
      .grid-container {
        grid-template-columns: 1fr;
      }

      header h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Choose Your Quiz Deck</h1>
  </header>
  <main>
    <div class="grid-container">
      <a href="testing.php" class="grid-item">Sustainability</a>
      <a href="technology_quiz.php" class="grid-item">Current Trends</a>
      <a href="science_quiz.php" class="grid-item">Solar Power</a>
      <a href="history_quiz.php" class="grid-item">Pollution</a>
      <a href="math_quiz.php" class="grid-item">Reforestation</a>
      <a href="general_knowledge_quiz.php" class="grid-item">Carbon Cycle</a>
    </div>
  </main>
</body>
</html>
