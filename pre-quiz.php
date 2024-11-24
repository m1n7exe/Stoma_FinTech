<?php
session_start();

include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Introduction</title>
    <link rel="stylesheet" href="quiz.css">

    <style>
        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>


<body>

    <video class="background-video" autoplay muted loop>
        <source src="assets/animated-scene-quiz.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="pre-quiz-container">
        <header>
            <h1>Welcome to the Quiz!</h1>
        </header>

        <section class="quiz-intro">
            <p>Welcome to the exciting quiz! In this quiz, you'll be tested on various questions. Here’s how it works:</p>
            <ul>
                <li>Answer more than 8 questions correctly to win points!</li>
                <li>Get all answers correct and your points will be doubled!</li>
            </ul>
        </section>

        <button class="start-quiz-btn" onclick="window.location.href='quiz.php'">Start Quiz</button>
    </div>






</body>

</html>
