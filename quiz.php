<?php
// You can use PHP here if you need dynamic content, such as fetching quiz data from a database or handling user sessions
// For example, you can store a session or a variable with the user's progress

session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz App</title>
    <link rel="stylesheet" href="quiz.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="app">
        <h1> Let's Test Your Knowledge</h1>
        <div class="quiz">
            <h2 id="question"> Question goes here</h2>
            <div id="answer-buttons">
                <button class="btn" id="answer1">Answer 1</button>
                <button class="btn" id="answer2">Answer 2</button>
                <button class="btn" id="answer3">Answer 3</button>
                <button class="btn" id="answer4">Answer 4</button>
            </div>
            <button id="next-btn" class="next-btn">Next</button>
        </div>
    </div>

    <!-- You can include JavaScript in the same file or link to an external script.js -->
    <script src="script.js"></script>
  </body>
</html>
