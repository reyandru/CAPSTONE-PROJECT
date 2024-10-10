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
const addBtnWeight = document.getElementById("addBtnWeights");
const addBTNWeights = document.querySelector('#addBtnWeights');
const inputContWeights = document.getElementById("inputWeight");
const circle = document.getElementById("circle");

document.addEventListener('DOMContentLoaded', function() {
  const storedGoalWeight = localStorage.getItem('goalWeight');
  if (storedGoalWeight) {
    document.getElementById("goalW").value = storedGoalWeight;
  }
  loadOutput(); 
  loadCircleValue(); 
});

addBTNWeights.addEventListener('click', function() {
  inputContWeights.classList.add("showsWeightInput");
  addBtnWeight.classList.add("hideAddBtnWeight");
});

document.getElementById("xBtnWeight").addEventListener('click', function() {
  inputContWeights.classList.remove("showsWeightInput");
  addBtnWeight.classList.remove("hideAddBtnWeight");
});

document.getElementById("addWeights").addEventListener('click', function() {
  const currentWeight = parseFloat(document.getElementById("weights").value);
  const goalWeight = parseFloat(document.getElementById("goalW").value);
  const startWeight = parseFloat(document.getElementById("startW").value);

  if (!isNaN(currentWeight) && !isNaN(goalWeight) && !isNaN(startWeight)) {
    const outputs = JSON.parse(localStorage.getItem('weightOutputs')) || [];

    if (outputs.length <= 3) {
      outputs.shift(); 
    }

    let percent; 

    if (currentWeight >= goalWeight) {
      const progress = ((currentWeight - goalWeight) / (startWeight - goalWeight)) * 100;
      percent = Math.max(0, Math.min(100, progress.toFixed(0))); // Ensure it stays within 0% to 100%
    } else {
      const progress = ((goalWeight - currentWeight) / (goalWeight - startWeight)) * 100;
      percent = Math.max(0, Math.min(100, progress.toFixed(0))); // Ensure it stays within 0% to 100%
    }

    const output = createOutputDiv(currentWeight, percent);
    outputs.push(output); 

    updateOutputContainer(outputs);
    saveOutputs(outputs);
    
    circle.innerHTML = percent + " %";
    localStorage.setItem('circleValue', percent); 
    localStorage.setItem('goalWeight', goalWeight);

    clearInputs();
  } else {
    alert("Please enter valid numbers for all weights.");
  }
});

function createOutputDiv(currentWeight, percent) {
  return {
    date: new Date().toLocaleDateString(),
    weight: currentWeight,
    progress: percent, 
  };
}

function updateOutputContainer(outputs) {
  const outputContainer = document.getElementById('outputWeight');
  outputContainer.innerHTML = ''; 
  outputs.forEach(output => {
    const newDiv = document.createElement('div');
    newDiv.className = 'outputConts';
    newDiv.innerHTML = 
      `<div>${output.date}</div>` +
      `<div>Current Weight: ${output.weight} kg</div>` +
      `<div>${output.progress} % Progress</div>`; 
    outputContainer.appendChild(newDiv);
  });
}

function saveOutputs(outputs) {
  localStorage.setItem('weightOutputs', JSON.stringify(outputs));
}

function loadOutput() {
  const outputs = JSON.parse(localStorage.getItem('weightOutputs')) || [];
  updateOutputContainer(outputs);
}

function loadCircleValue() {
  const storedCircleValue = localStorage.getItem('circleValue');
  if (storedCircleValue) {
    circle.innerHTML = storedCircleValue + " %"; 
  } else {
    circle.innerHTML = "0 %"; 
  }
}

function clearInputs() {
  document.getElementById("weights").value = '';
  document.getElementById("goalW").value = '';
  document.getElementById("startW").value = '';
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