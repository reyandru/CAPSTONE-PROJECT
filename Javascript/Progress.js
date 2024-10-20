document.addEventListener("DOMContentLoaded", function() {
  const hamburger = document.getElementById('hamburger');
  const nav = document.querySelector('.nav');
  const menu = document.getElementById('menu');

  hamburger.addEventListener('click', function() {
      nav.classList.toggle('expanded');
  });
});

function myFunction(x) {
  x.classList.toggle("change");
}

//weight progress
function calculateProgress() {
  const goalWeight = parseFloat(document.getElementById("goalW").value);
  const currentWeight = parseFloat(document.getElementById("currentWeights").value);
  const goalType = document.getElementById("goalType").value;
  let progressMessage = "";

  if (isNaN(goalWeight) || isNaN(currentWeight)) {
      alert("Please enter valid weights.");
      return false;
  }

  if (goalType === "lose") {
      if (currentWeight > goalWeight) {
          const weightDifference = currentWeight - goalWeight;
          progressMessage = `You need to lose ${weightDifference} kg to reach your goal.`;
      } else {
          progressMessage = "Your current weight is already lower than or equal to your goal.";
      }
  } else if (goalType === "gain") {
      if (currentWeight < goalWeight) {
          const weightDifference = goalWeight - currentWeight;
          progressMessage = `You need to gain ${weightDifference} kg to reach your goal.`;
      } else {
          progressMessage = "Your current weight is already higher than or equal to your goal.";
      }
  }

  document.getElementById("outputWeight").innerHTML = progressMessage;
  return false;  
}