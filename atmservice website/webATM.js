/* This is for timer for the website */

function formatTimeLeft(time) {
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;
    if (seconds < 10) {
      seconds = `0${seconds}`;
    }
    return `${minutes}:${seconds}`;
  }
  
  const initialTime = 600; // 10 minutes in seconds
  let timeRemaining = initialTime;
  
  function updateTimer() {
    document.querySelector('.base-timer span').textContent = formatTimeLeft(timeRemaining);
    timeRemaining--;
    if (timeRemaining < 0) {
      clearInterval(countdownInterval);
      document.querySelector('.base-timer span').textContent = 'Time\'s up!';
    }
  }
  
  const countdownInterval = setInterval(updateTimer, 1000);

  /*JS for timer ends here */