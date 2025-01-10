<div id="timer">3:00</div>

<style>
  #timer {
    position: fixed;
    top: 20px;
    right: 20px;
    font-size: 1.5rem;
    font-weight: bold;
    color: #264653;
    font-family: 'Fredoka One', cursive;
    z-index: 1000;
  }
</style>

<script>
  // Timer JavaScript logic
  let timeLeft = 3 * 60; // 3 minutes in seconds

  // Function to update the timer display
  function updateTimer() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    document.getElementById('timer').textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  }

  // Countdown logic
  const timerInterval = setInterval(function () {
    if (timeLeft > 0) {
      timeLeft--;
      updateTimer();
    } else {
      clearInterval(timerInterval); // Stop the timer when it reaches 0
      alert('Time is up!');
    }
  }, 1000); // Update every second
</script>
