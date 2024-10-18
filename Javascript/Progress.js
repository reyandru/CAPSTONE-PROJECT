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
  console.log("Add button clicked!");  // Debugging log to check if the button click works
  
  const currentWeight = parseFloat(document.getElementById("currentWeights").value);
  const goalWeight = parseFloat(document.getElementById("goalW").value);
  const goalType = document.getElementById("goalType").value;

  if (!isNaN(currentWeight) && !isNaN(goalWeight)) { 
    const outputs = JSON.parse(localStorage.getItem('weightOutputs')) || [];

    if (outputs.length >= 3) {
      outputs.shift(); 
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

