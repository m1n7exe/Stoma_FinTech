const questions = [
    {
      question: "What is carbon neutrality?",
      answers: [
        { text: "The reduction of carbon emissions to zero", correct: true },
        { text: "The complete elimination of carbon dioxide from the atmosphere", correct: false },
        { text: "Increasing carbon emissions to balance the environment", correct: false },
        { text: "The conversion of carbon dioxide into oxygen", correct: false },
      ],
    },
    {
      question: "What is renewable energy?",
      answers: [
        { text: "Energy that comes from fossil fuels", correct: false },
        { text: "Energy that is replenished naturally", correct: true },
        { text: "Energy stored in batteries", correct: false },
        { text: "Energy produced by all types of fuel", correct: false },
      ],
    },
    {
      question: "Which of the following is a greenhouse gas?",
      answers: [
        { text: "Oxygen", correct: false },
        { text: "Methane", correct: true },
        { text: "Nitrogen", correct: false },
        { text: "Hydrogen", correct: false },
      ],
    },
    {
      question: "What does sustainability aim to achieve?",
      answers: [
        { text: "Overuse of natural resources", correct: false },
        { text: "Maintaining ecological balance", correct: true },
        { text: "Reducing human life expectancy", correct: false },
        { text: "Faster depletion of energy sources", correct: false },
      ],
    },
    {
      question: "Which of these activities helps reduce carbon footprint?",
      answers: [
        { text: "Using public transport", correct: true },
        { text: "Burning more coal", correct: false },
        { text: "Deforestation", correct: false },
        { text: "Leaving lights on all day", correct: false },
      ],
    },
    {
      question: "What is the main cause of climate change?",
      answers: [
        { text: "Sunspots", correct: false },
        { text: "Human activities", correct: true },
        { text: "Ocean tides", correct: false },
        { text: "Volcanic eruptions", correct: false },
      ],
    },
    {
      question: "What is a key feature of a circular economy?",
      answers: [
        { text: "Recycling and reusing materials", correct: true },
        { text: "Increased waste production", correct: false },
        { text: "Single-use products", correct: false },
        { text: "Exploitation of resources", correct: false },
      ],
    },
    {
      question: "How can planting trees help the environment?",
      answers: [
        { text: "By absorbing carbon dioxide", correct: true },
        { text: "By producing methane", correct: false },
        { text: "By reducing oxygen levels", correct: false },
        { text: "By consuming natural resources", correct: false },
      ],
    },
    {
      question: "Which sector contributes the most to greenhouse gas emissions?",
      answers: [
        { text: "Agriculture", correct: false },
        { text: "Energy production", correct: true },
        { text: "Transportation", correct: false },
        { text: "Tourism", correct: false },
      ],
    },
    {
      question: "What is the purpose of a carbon tax?",
      answers: [
        { text: "To increase carbon emissions", correct: false },
        { text: "To penalize high carbon emissions", correct: true },
        { text: "To reward polluting industries", correct: false },
        { text: "To fund fossil fuel projects", correct: false },
      ],
    },
  ];

  
let currentQuestionIndex = 0;
let score = 0;

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons")
const nextButton = document.getElementById("next-btn")

function startQuiz(){
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();
}

function playDingSound() {
        const dingSound = new Audio('assets/ding.mp3');


    dingSound.play();
}

function showQuestion(){
    resetState()
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + "." + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButtons.appendChild(button);


        if (answer.correct){
            button.dataset.correct = answer.correct;
        }

        button.addEventListener("click" , selectAnswer);
    });
}

function resetState(){
    nextButton.style.display = "none";
    while(answerButtons.firstChild){
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e){
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true" ;
    if(isCorrect){
        selectedBtn.classList.add("correct");
        score++;
        playDingSound()
    
    }
    else{
        selectedBtn.classList.add("incorrect");
    }

    Array.from(answerButtons.children).forEach(button => {
        if(button.dataset.correct === "true"){
            button.classList.add("correct");
        }
        button.disabled = true;

    });
    nextButton.style.display = "block";

}

function showScore(){
    resetState();
    questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
    nextButton.innerHTML = "Done";
    nextButton.style.display = "block";
}

function handleNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length) {
        showQuestion();
    }else{
        showScore();
    }
    
}
nextButton.addEventListener("click", ()=>{
    if (currentQuestionIndex < questions.length){
        handleNextButton();
    }
        else{
        goBackToPreQuiz();
    }
    function goBackToPreQuiz() {
      window.location.href = "pre-quiz.php"; // Redirect to a completion page
  }
  
});


startQuiz();
