const questions = [
  {
      question: "What is carbon neutrality?",
      answers: [
          { text: "The reduction of carbon emissions to zero", correct: true, explanation: "Carbon neutrality means balancing the amount of carbon emitted with an equivalent amount of carbon removed or offset." },
          { text: "The complete elimination of carbon dioxide from the atmosphere", correct: false, explanation: "Carbon neutrality does not mean eliminating CO2, but balancing emissions through reduction or offsetting." },
          { text: "Increasing carbon emissions to balance the environment", correct: false, explanation: "Increasing emissions would contribute to climate change, not balance the environment." },
          { text: "The conversion of carbon dioxide into oxygen", correct: false, explanation: "While plants do convert CO2 into oxygen, carbon neutrality focuses on balancing emissions, not converting CO2." },
      ],
  },
  {
      question: "What is renewable energy?",
      answers: [
          { text: "Energy that comes from fossil fuels", correct: false, explanation: "Fossil fuels are non-renewable and contribute to climate change." },
          { text: "Energy that is replenished naturally", correct: true, explanation: "Renewable energy comes from sources like sunlight, wind, and geothermal heat, which are naturally replenished." },
          { text: "Energy stored in batteries", correct: false, explanation: "Batteries store energy, but renewable energy refers to the sources of power, not storage." },
          { text: "Energy produced by all types of fuel", correct: false, explanation: "Not all fuels are renewable. Renewable energy specifically refers to sustainable sources." },
      ],
  },
  {
      question: "Which of the following is a greenhouse gas?",
      answers: [
          { text: "Oxygen", correct: false, explanation: "Oxygen is not a greenhouse gas." },
          { text: "Methane", correct: true, explanation: "Methane is a potent greenhouse gas that contributes to global warming." },
          { text: "Nitrogen", correct: false, explanation: "Nitrogen is not a greenhouse gas." },
          { text: "Hydrogen", correct: false, explanation: "Hydrogen does not contribute to the greenhouse effect in the atmosphere." },
      ],
  },
  {
      question: "What does sustainability aim to achieve?",
      answers: [
          { text: "Overuse of natural resources", correct: false, explanation: "Sustainability focuses on the responsible use of resources, not their overuse." },
          { text: "Maintaining ecological balance", correct: true, explanation: "Sustainability aims to maintain ecological balance by using resources responsibly and protecting the environment." },
          { text: "Reducing human life expectancy", correct: false, explanation: "Sustainability is about ensuring a healthy environment for future generations, not reducing life expectancy." },
          { text: "Faster depletion of energy sources", correct: false, explanation: "Sustainability seeks to reduce the depletion of energy sources and promotes renewable options." },
      ],
  },
  {
      question: "Which of these activities helps reduce carbon footprint?",
      answers: [
          { text: "Using public transport", correct: true, explanation: "Public transport reduces the number of individual vehicles on the road, reducing emissions." },
          { text: "Burning more coal", correct: false, explanation: "Burning coal increases carbon emissions and contributes to global warming." },
          { text: "Deforestation", correct: false, explanation: "Deforestation contributes to increased carbon emissions and reduces the planet's ability to absorb CO2." },
          { text: "Leaving lights on all day", correct: false, explanation: "Leaving lights on uses more energy, which increases carbon emissions." },
      ],
  },
  {
      question: "What is the main cause of climate change?",
      answers: [
          { text: "Sunspots", correct: false, explanation: "Sunspots do not significantly contribute to climate change." },
          { text: "Human activities", correct: true, explanation: "Human activities, especially burning fossil fuels, are the primary cause of climate change." },
          { text: "Ocean tides", correct: false, explanation: "Ocean tides are a natural phenomenon and do not cause climate change." },
          { text: "Volcanic eruptions", correct: false, explanation: "Volcanic eruptions can affect climate temporarily, but human activities are the main drivers of climate change." },
      ],
  },
  {
      question: "What is a key feature of a circular economy?",
      answers: [
          { text: "Recycling and reusing materials", correct: true, explanation: "A circular economy focuses on reusing and recycling materials to minimize waste." },
          { text: "Increased waste production", correct: false, explanation: "A circular economy aims to reduce waste production, not increase it." },
          { text: "Single-use products", correct: false, explanation: "Single-use products are not part of a circular economy, as they contribute to waste." },
          { text: "Exploitation of resources", correct: false, explanation: "A circular economy seeks to reduce the exploitation of resources by reusing and recycling them." },
      ],
  },
  {
      question: "How can planting trees help the environment?",
      answers: [
          { text: "By absorbing carbon dioxide", correct: true, explanation: "Trees absorb CO2 during photosynthesis, helping reduce atmospheric carbon levels." },
          { text: "By producing methane", correct: false, explanation: "Trees do not produce methane; they help mitigate it by absorbing carbon dioxide." },
          { text: "By reducing oxygen levels", correct: false, explanation: "Trees produce oxygen, not reduce it, during photosynthesis." },
          { text: "By consuming natural resources", correct: false, explanation: "Trees are part of nature's cycle and do not consume natural resources in a harmful way." },
      ],
  },
  {
      question: "Which sector contributes the most to greenhouse gas emissions?",
      answers: [
          { text: "Agriculture", correct: false, explanation: "Agriculture contributes to emissions but is not the largest sector." },
          { text: "Energy production", correct: true, explanation: "Energy production, especially from fossil fuels, is the largest contributor to greenhouse gas emissions." },
          { text: "Transportation", correct: false, explanation: "Transportation is a significant source of emissions but not the largest." },
          { text: "Tourism", correct: false, explanation: "Tourism has an environmental impact, but it is not the largest contributor to emissions." },
      ],
  },
  {
      question: "What is the purpose of a carbon tax?",
      answers: [
          { text: "To increase carbon emissions", correct: false, explanation: "A carbon tax is designed to reduce emissions, not increase them." },
          { text: "To penalize high carbon emissions", correct: true, explanation: "A carbon tax is intended to encourage businesses and individuals to reduce their carbon emissions by charging a fee for high emissions." },
          { text: "To reward polluting industries", correct: false, explanation: "The goal of a carbon tax is to penalize, not reward, polluting industries." },
          { text: "To fund fossil fuel projects", correct: false, explanation: "A carbon tax is not meant to fund fossil fuel projects but to reduce reliance on them." },
      ],
  },
];

let currentQuestionIndex = 0;
let score = 0;

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

explanationContainer.classList.add("explanation-container"); // new container for explanation
const timerElement = document.getElementById('timer');
// Assuming your current JS structure has these elements defined

const explanationContainer = document.getElementById('explanation-container');

function startQuiz() {
  currentQuestionIndex = 0;
  score = 0;
  nextButton.innerHTML = "Next";
  showQuestion(currentQuestionIndex);
}

function playDingSound() {
  const dingSound = new Audio('assets/ding.mp3');
  dingSound.play();
}

function showScore() {
  resetState();
  questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
  nextButton.innerHTML = "Done";
  nextButton.style.display = "block";

  // Add a redirection after a short delay (e.g., 2 seconds)
  setTimeout(function () {
    window.location.href = 'dbf1.php';  // Replace with your target page URL, this is hard coded
  }, 2000); // 2 seconds delay before redirecting
}


function resetState() {
  nextButton.style.display = "none";
  explanationContainer.innerHTML = ''; // Clear explanation container
  while (answerButtons.firstChild) {
    answerButtons.removeChild(answerButtons.firstChild);
  }
}

function selectAnswer(e) {
  const selectedBtn = e.target;
  const currentQuestion = questions[currentQuestionIndex];

  // Find the selected answer and its explanation
  const selectedAnswer = currentQuestion.answers.find(answer => answer.text === selectedBtn.innerText);

  // Clear any previous explanation
  explanationContainer.innerHTML = '';

  // Add the explanation for the selected answer
  const explanationElement = document.createElement("p");
  explanationElement.innerText = selectedAnswer.explanation;
  explanationContainer.appendChild(explanationElement); // Add to container

  // Highlight the selected answer based on correctness
  if (selectedAnswer.correct) {
    selectedBtn.classList.add("correct");
    score++;
    playDingSound();
  
    // Style explanation for correct answers
    explanationContainer.classList.add("correct-explanation");
    explanationContainer.innerHTML = `<p>Correct! ${selectedAnswer.explanation}</p>`;
  } else {
    selectedBtn.classList.add("incorrect");
  
    // Style explanation for incorrect answers
    explanationContainer.classList.add("incorrect-explanation");
    explanationContainer.innerHTML = `<p>Incorrect! ${selectedAnswer.explanation}</p>`;
  }

  // Disable all buttons after selecting an answer
  Array.from(answerButtons.children).forEach(button => {
    button.disabled = true;
  });

  nextButton.style.display = "block";
}

function showQuestion(questionIndex) {
  const question = questions[questionIndex];
  questionElement.innerText = question.question;
  answerButtons.innerHTML = ''; // Clear any previous answers

  question.answers.forEach((answer) => {
    const button = document.createElement('button');
    button.innerText = answer.text;
    button.classList.add('btn');
    button.onclick = selectAnswer;
    answerButtons.appendChild(button);
  });

  // Clear the explanation container for a new question
  explanationContainer.innerHTML = '';
}
function handleNextButton() {
  currentQuestionIndex++;
  if (currentQuestionIndex < questions.length) {
    showQuestion(currentQuestionIndex);
  } else {
    showScore();
  }
}

nextButton.addEventListener("click", () => {
  if (currentQuestionIndex < questions.length) {
    handleNextButton();
  } else {
    showScore();
  }
});

// Timer
window.addEventListener('DOMContentLoaded', function () {
  let timeLeft = 180; // 3 minutes in seconds
  const timerInterval = setInterval(function () {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    timeLeft--;

    if (timeLeft < 0) {
      clearInterval(timerInterval);
      showScore();
    }
  }, 1000);
});

