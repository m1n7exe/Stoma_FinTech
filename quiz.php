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
   <!-- <link rel="stylesheet" href="quiz.css"> -->
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

    <style>
      /* General Reset */
body, h1, h2, div, button {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body Styling */
body {
  font-family: 'Poppins', sans-serif;
  color: #333; /* Darker text for readability */
  background-color: orange; /* Orange background for the entire page */
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 20px;
}

/* Main Container */
.app {
  background: white; /* Set background to orange */
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px 30px;
  max-width: 500px;
  text-align: center;
  width: 100%;
}

/* Heading Styling */
h1 {
  font-size: 24px;
  margin-bottom: 20px;
  color: #2d6a4f;
  border-bottom:1px solid #333;
  padding: 28px;
}

/* Quiz Container */
.quiz {
  margin-top: 15px;
}

/* Question Styling */
#question {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  color: #1b4332;
}

/* Answer Buttons */
#answer-buttons {
  display: flex;
  flex-direction: column;
  gap: 15px; /* Increased space between answer buttons */
  margin-bottom: 20px; /* Add space at the bottom of the answer section */
}

button.btn {
  background: #fff; /* Light green buttons */
  color: #000;
  font-size: 16px;
  border-style: dotted;
  border-width: 2px;
  border-radius: 8px;
  padding: 10px 15px;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
}

.btn:hover:not([disabled]){
  background: #222;
  color: #fff;
}
.btn:disabled{
  cursor:no-drop;
}

button.btn:active {
  transform: translateY(0);
}

/* Next Button Styling with Arrow */
button.next-btn {
  background: #1b4332; /* Dark green */
  color: #fff;
  font-family: 'Poppins', sans-serif; 
  width: 80px;
  border: 2px;
  border-radius: 8px;
  padding: 12px 20px;
  display: block; /* Make the button a block element */
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
}

button.next-btn:hover {
  background: #40916c; /* Lighter green */
  transform: translateY(-2px);
}

button.next-btn:active {
  background: #52b788; /* Even lighter on click */
  transform: translateY(0);
}

/* Alignment for Next Button */
#next-btn {
  text-align: center;
  margin: 0 auto;
  font-size: 12px; /* Larger font size for better visibility */
}

button.btn.correct{
  background: #9aeabc;
}

button.btn.incorrect{
  background: #ff9393;
}


/* Pre-Quiz Page Styling */
/* Pre-Quiz Container */
.pre-quiz-container {
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px 30px;
  max-width: 500px;
  text-align: center;
  width: 100%;
}

/* Header Styling */
header {
  margin-bottom: 20px;
}

h1 {
  font-size: 24px;
  color: #2d6a4f;
  border-bottom: 1px solid #333;
  padding: 10px 0;
}

/* Introduction Text Styling */
.quiz-intro {
  font-size: 18px;
  color: #1b4332;
  margin-bottom: 20px;
  line-height: 1.6;
}

.quiz-intro ul {
  text-align: left;
  margin-left: 20px;
}

.quiz-intro li {
  margin-bottom: 10px;
}

/* Start Quiz Button Styling */
.start-quiz-btn {
  background-color: #1b4332; /* Dark green */
  color: white;
  font-size: 16px;
  padding: 12px 20px;
  border: 2px solid #1b4332;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
  text-decoration: none;
}

.start-quiz-btn:hover {
  background-color: #40916c; /* Lighter green */
  transform: translateY(-2px);
}

.start-quiz-btn:active {
  background-color: #52b788; /* Even lighter on click */
  transform: translateY(0);
}
/* Explanation Container */
.app .explanation-container {
    /* display: none; */ /* Temporarily comment this out */
    margin-top: 20px;
    font-size: 1.2rem;
    color: #333;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
    text-align: left;
    border-left: 4px solid #40916c; /* Green border for emphasis */
}


    </style>
  </head>



  <body>

    <?php include 'timer.php'; ?>

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
        <div id="explanation-container" class="explanation-container"></div>
    </div>

    <!-- You can include JavaScript in the same file or link to an external script.js -->
    <script src="script.js"></script>
  </body>
</html>
