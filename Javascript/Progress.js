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


document.addEventListener("DOMContentLoaded", function() {
  const ddBtn = document.querySelector('.dropDown');
  const ddConts = document.querySelector('.DD-container');
 
  ddBtn.addEventListener('click', function() {
    ddConts.classList.toggle('ddactive');
  });
});


//weight progress
document.addEventListener('DOMContentLoaded', function() {
  loadOutput();
  loadCircleValue();
});

document.getElementById("addBtnWeights").addEventListener('click', function() {
  document.getElementById("inputWeight").classList.add("showsWeightInput");
});

document.getElementById("xBtnWeight").addEventListener('click', function() {
  document.getElementById("inputWeight").classList.remove("showsWeightInput");
});

document.getElementById("addWeights").addEventListener('click', function(event) {
  event.preventDefault();
  const currentWeight = parseFloat(document.getElementById("weights").value);
  const goalWeight = parseFloat(document.getElementById("goalW").value);
  const goalType = document.getElementById("goalType").value;

  if (!isNaN(currentWeight) && !isNaN(goalWeight)) {
      if (goalType === "gain" && goalWeight <= currentWeight) {
          alert("For gaining weight, please enter a goal weight that is higher than your current weight.");
          return;
      } else if (goalType === "lose" && goalWeight >= currentWeight) {
          alert("For losing weight, please enter a goal weight that is lower than your current weight.");
          return;
      }

      let percent;
      
      if (goalType === "lose") {
          percent = ((currentWeight - goalWeight) / currentWeight) * 100;
      } else if (goalType === "gain") {
          percent = ((goalWeight - currentWeight) / goalWeight) * 100;
      }

      percent = Math.max(0, Math.min(100, percent));

      const output = createOutputDiv(currentWeight, percent);
      saveOutputs(output);
      updateOutputContainer();
      document.getElementById("circle").innerHTML = percent.toFixed(0) + "%";
      clearInputs();
  } else {
      alert("Please enter valid numbers for the goal and current weight.");
  }
});

function createOutputDiv(currentWeight, percent) {
  return {
      date: new Date().toLocaleDateString(),
      weight: currentWeight,
      progress: percent,
  };
}

function saveOutputs(output) {
  const existingOutputs = JSON.parse(localStorage.getItem('weightOutputs')) || [];
  
  if (existingOutputs.length >= 3) {
      existingOutputs.shift();
  }
  
  existingOutputs.push(output);
  localStorage.setItem('weightOutputs', JSON.stringify(existingOutputs));
}

function updateOutputContainer() {
  const outputs = JSON.parse(localStorage.getItem('weightOutputs')) || [];
  const outputContainer = document.getElementById('outputWeight');
  outputContainer.innerHTML = '';

  outputs.forEach(output => {
      const newDiv = document.createElement('div');
      newDiv.className = 'outputConts';
      newDiv.innerHTML = 
          `<div>${output.date}</div>` +
          `<div>Current Weight: ${output.weight} kg</div>` +
          `<div>${output.progress.toFixed(0)} % Progress</div>`;
      outputContainer.appendChild(newDiv);
  });
}

function loadOutput() {
  const outputs = JSON.parse(localStorage.getItem('weightOutputs')) || [];
  updateOutputContainer();
}

function loadCircleValue() {
  const storedCircleValue = localStorage.getItem('circleValue');
  if (storedCircleValue) {
      document.getElementById("circle").innerHTML = storedCircleValue + "%"; 
  } 
}

function clearInputs() {
  document.getElementById("weights").value = '';
  document.getElementById("goalW").value = '';
}


//Workout progress

const checkboxes = document.querySelectorAll('.workoutProgression input[type="checkbox"]');
const circleContainer = document.getElementById('circleContainer');
const resetButton = document.getElementById('submitWO');

// Load checkbox states and percentage from localStorage
document.addEventListener('DOMContentLoaded', loadProgress);

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', updateProgress);
});

resetButton.addEventListener('click', resetProgress);

function updateProgress() {
  const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
  const totalCheckboxes = checkboxes.length;
  const percentage = (checkedCount / totalCheckboxes) * 100;
  
  circleContainer.textContent = `${percentage.toFixed(0)}%`;
  
  // Save the current state to localStorage
  saveProgress();
}

function resetProgress() {
  checkboxes.forEach(checkbox => {
    checkbox.checked = false;
  });
  circleContainer.textContent = '0%';
  
  // Clear the localStorage
  localStorage.removeItem('checkboxStates');
  localStorage.removeItem('progressPercentage');
}

function saveProgress() {
  const states = Array.from(checkboxes).map(checkbox => checkbox.checked);
  localStorage.setItem('checkboxStates', JSON.stringify(states));
  
  const checkedCount = states.filter(checked => checked).length;
  const totalCheckboxes = checkboxes.length;
  const percentage = (checkedCount / totalCheckboxes) * 100;
  localStorage.setItem('progressPercentage', percentage.toFixed(0));
}

function loadProgress() {
  const savedStates = JSON.parse(localStorage.getItem('checkboxStates'));
  const savedPercentage = localStorage.getItem('progressPercentage');

  if (savedStates) {
    checkboxes.forEach((checkbox, index) => {
      checkbox.checked = savedStates[index] || false;
    });
  }

  if (savedPercentage) {
    circleContainer.textContent = `${savedPercentage}%`;
  }
}


//Feedback function

const fbConts = document.getElementById("fb-conts");
const editBtn = document.getElementById("edit-btn-fb");
document.getElementById("submit-btn-fb").addEventListener('click', function (){
  const inputFb = document.getElementById("feedback-conts").value;

  if(inputFb){
    fbConts.classList.add("shows");
    editBtn.classList.add("shows-edit");
    fbConts.innerHTML = inputFb;
  } 
  editBtn.addEventListener('click', function(){
    fbConts.classList.remove("shows");
    editBtn.classList.remove("shows-edit");
  })
   
    //localStorage
    localStorage.setItem("Feedback", inputFb);
// Retrieve
    document.getElementById("feedback-conts").innerHTML = localStorage.getItem("feedback");

});