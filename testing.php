<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: orange;
        margin: 0;
      }
      .app {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px 30px;
        max-width: 500px;
        text-align: center;
      }
      h1 {
        color: #2d6a4f;
      }
      #question {
        font-size: 20px;
        margin-bottom: 20px;
        color: #1b4332;
      }
      #answer-buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }
      .btn {
        padding: 10px;
        border: 2px dotted #2d6a4f;
        border-radius: 8px;
        background: #fff;
        cursor: pointer;
        transition: background 0.3s;
      }
      .btn:hover {
        background: #2d6a4f;
        color: #fff;
      }
      .btn.correct {
        background: #9aeabc;
      }
      .btn.incorrect {
        background: #ff9393;
      }
      .next-btn {
        margin-top: 20px;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        background: #1b4332;
        color: #fff;
        cursor: pointer;
        transition: background 0.3s;
      }
      .next-btn:hover {
        background: #40916c;
      }
      .explanation-container {
        margin-top: 20px;
        padding: 10px;
        border-radius: 5px;
        border-left: 4px solid #40916c;
        background: #f9f9f9;
        text-align: left;
      }
    </style>
  </head>
  <body>

  <?php include 'timer.php'; ?>
  
    <div class="app">
      <h1>Test Your Knowledge</h1>
      <div id="quiz-container">
        <div id="question">Question will appear here</div>
        <div id="answer-buttons"></div>
        <div id="explanation-container" class="explanation-container" style="display: none;"></div>
        <button id="next-btn" class="next-btn" style="display: none;">Next</button>
      </div>
    </div>
    <script>
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
          question: "What is the greenhouse effect?",
          answers: [
            { text: "The process of plants converting carbon dioxide into oxygen", correct: false, explanation: "This is photosynthesis, not the greenhouse effect." },
            { text: "The trapping of heat in the Earth's atmosphere", correct: true, explanation: "The greenhouse effect occurs when greenhouse gases trap heat in the Earth's atmosphere, warming the planet." },
            { text: "The burning of fossil fuels", correct: false, explanation: "While burning fossil fuels contributes to the greenhouse effect, it is not the definition of the greenhouse effect." },
            { text: "The depletion of the ozone layer", correct: false, explanation: "The depletion of the ozone layer is a separate environmental issue from the greenhouse effect." },
          ],
        },
        {
          question: "What is the primary source of renewable energy?",
          answers: [
            { text: "Wind", correct: true, explanation: "Wind energy is one of the primary renewable energy sources, harnessed using turbines to generate electricity." },
            { text: "Coal", correct: false, explanation: "Coal is a non-renewable fossil fuel, not a source of renewable energy." },
            { text: "Natural gas", correct: false, explanation: "Natural gas is a fossil fuel and not considered renewable." },
            { text: "Hydropower", correct: true, explanation: "Hydropower uses water flow to generate electricity and is a reliable renewable energy source." },
          ],
        },
        {
          question: "What is the most common greenhouse gas emitted by human activities?",
          answers: [
            { text: "Carbon dioxide (CO2)", correct: true, explanation: "Carbon dioxide is the most prevalent greenhouse gas produced by human activities, particularly through burning fossil fuels." },
            { text: "Methane (CH4)", correct: false, explanation: "While methane is a potent greenhouse gas, carbon dioxide is more commonly emitted." },
            { text: "Ozone (O3)", correct: false, explanation: "Ozone is a greenhouse gas, but it is not emitted as frequently as carbon dioxide." },
            { text: "Nitrous oxide (N2O)", correct: false, explanation: "Nitrous oxide is a greenhouse gas but is less abundant than carbon dioxide." },
          ],
        },
        {
          question: "What is the Paris Agreement?",
          answers: [
            { text: "An international treaty to reduce global temperatures", correct: true, explanation: "The Paris Agreement is a treaty aimed at limiting global warming to below 2°C compared to pre-industrial levels." },
            { text: "An agreement to ban fossil fuel usage", correct: false, explanation: "The Paris Agreement aims to reduce emissions, not to completely ban fossil fuels." },
            { text: "A treaty to promote nuclear energy", correct: false, explanation: "The Paris Agreement focuses on reducing carbon emissions, not promoting nuclear energy." },
            { text: "A plan to implement climate engineering technologies", correct: false, explanation: "The Paris Agreement emphasizes mitigation and adaptation to climate change, not climate engineering." },
          ],
        },
        {
          question: "What is a carbon footprint?",
          answers: [
            { text: "The amount of carbon emissions produced by an individual, organization, or product", correct: true, explanation: "A carbon footprint measures the total greenhouse gas emissions caused by human activity." },
            { text: "The amount of carbon dioxide absorbed by plants", correct: false, explanation: "While plants absorb CO2, the carbon footprint refers to emissions, not absorption." },
            { text: "The footprint left by carbon-based materials", correct: false, explanation: "The carbon footprint is not related to physical footprints but refers to emissions from human activity." },
            { text: "A method for recycling carbon", correct: false, explanation: "Carbon recycling is a separate process, but a carbon footprint measures emissions, not recycling." },
          ],
        },
        {
          question: "What is an electric vehicle?",
          answers: [
            { text: "A vehicle powered by gasoline", correct: false, explanation: "Electric vehicles run on electricity, not gasoline." },
            { text: "A vehicle that runs on electricity stored in batteries", correct: true, explanation: "Electric vehicles (EVs) use electricity stored in batteries to power electric motors." },
            { text: "A vehicle that produces no emissions", correct: false, explanation: "While EVs produce no direct emissions, the electricity generation process may still contribute to emissions." },
            { text: "A vehicle powered by solar panels", correct: false, explanation: "Some electric vehicles may be powered by solar panels, but not all of them are." },
          ],
        },
        {
          question: "What is the Kyoto Protocol?",
          answers: [
            { text: "A global agreement to reduce greenhouse gas emissions", correct: true, explanation: "The Kyoto Protocol is an international treaty that commits countries to reduce their emissions of greenhouse gases." },
            { text: "A plan to increase fossil fuel use", correct: false, explanation: "The Kyoto Protocol focuses on reducing, not increasing, greenhouse gas emissions." },
            { text: "An agreement to reduce ocean pollution", correct: false, explanation: "The Kyoto Protocol specifically focuses on greenhouse gases and climate change, not ocean pollution." },
            { text: "A treaty to protect biodiversity", correct: false, explanation: "The Kyoto Protocol is not focused on biodiversity; it deals with climate change and emissions reduction." },
          ],
        },
        {
          question: "What is the most effective way to reduce carbon emissions?",
          answers: [
            { text: "Switching to renewable energy sources", correct: true, explanation: "Switching to renewable energy sources like solar, wind, and hydroelectric power significantly reduces carbon emissions." },
            { text: "Using more fossil fuels", correct: false, explanation: "Using fossil fuels increases carbon emissions and exacerbates climate change." },
            { text: "Increasing carbon emissions", correct: false, explanation: "Increasing carbon emissions contributes to climate change and is not a solution." },
            { text: "Reducing the use of renewable energy", correct: false, explanation: "Reducing renewable energy usage would lead to more carbon emissions." },
          ],
        }
      ];

      const questionElement = document.getElementById("question");
      const answerButtonsElement = document.getElementById("answer-buttons");
      const nextButton = document.getElementById("next-btn");
      const explanationContainer = document.getElementById("explanation-container");

      let currentQuestionIndex = 0;

      function startQuiz() {
        currentQuestionIndex = 0;
        showQuestion();
      }

      function showQuestion() {
        resetState();
        const currentQuestion = questions[currentQuestionIndex];
        questionElement.innerText = currentQuestion.question;
        currentQuestion.answers.forEach((answer) => {
          const button = document.createElement("button");
          button.innerText = answer.text;
          button.classList.add("btn");
          if (answer.correct) {
            button.dataset.correct = true;
          }
          button.dataset.explanation = answer.explanation;
          button.addEventListener("click", selectAnswer);
          answerButtonsElement.appendChild(button);
        });
      }

      function resetState() {
        nextButton.style.display = "none";
        explanationContainer.style.display = "none";
        explanationContainer.innerHTML = "";
        answerButtonsElement.innerHTML = "";
      }

      function selectAnswer(e) {
        const selectedButton = e.target;
        const correct = selectedButton.dataset.correct === "true";
        const explanation = selectedButton.dataset.explanation;

        if (correct) {
          selectedButton.classList.add("correct");
        } else {
          selectedButton.classList.add("incorrect");
        }

        explanationContainer.innerHTML = correct
          ? `<strong>Correct!</strong> ${explanation}`
          : `<strong>Incorrect!</strong> ${explanation}`;
        explanationContainer.style.display = "block";

        Array.from(answerButtonsElement.children).forEach((button) => {
          button.disabled = true;
          if (button.dataset.correct === "true") {
            button.classList.add("correct");
          }
        });

        nextButton.style.display = "block";
      }

      nextButton.addEventListener("click", () => {
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
          showQuestion();
        } else {
          window.location.href = "dbf1.php"; // Redirect to dbf1.php after quiz completion
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



      startQuiz();
    </script>
  </body>
</html>
