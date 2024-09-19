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


// input and outputweights
const addBtnWeight = document.getElementById("addBtnWeights");
const addBTNWeights = document.querySelector('#addBtnWeights');
const inputContWeights = document.getElementById("inputWeight");

addBTNWeights.addEventListener('click', function(){
  inputContWeights.classList.add("showsWeightInput");
  addBtnWeight.classList.add("hideAddBtnWeight");
});

document.getElementById("xBtnWeight").addEventListener('click', function(){
  inputContWeights.classList.remove("showsWeightInput");
  addBtnWeight.classList.remove("hideAddBtnWeight");
});


document.getElementById("addWeights").addEventListener('click', function(){
  const inputfirst = document.getElementById("weights").value;
  const inputsecond = document.getElementById("goalW").value;
  const percent = (inputfirst / inputsecond  * 100).toFixed(0);
  const circle = document.getElementById("circle");

  if (!isNaN(percent)) {
  if (percent) {
    // Create a new div element to contain the output
    const newDiv = document.createElement('div');
    newDiv.className = 'outputConts';

    // Set the inner HTML of the new div
    newDiv.innerHTML = 
        `<div>${new Date().toLocaleDateString()}</div>` + // Current date
        inputfirst + " Exercises" +                        // First input followed by " Exercises"
        `<div>  </div>` +                                  // Empty div for spacing
        percent + " %";     
        
    // Get the output container element
    const outputContainer = document.getElementById('outputWeight');

    // Check if there are already 4 or more child nodes in the output container
    if (outputContainer.childNodes.length >= 2) {
        // Remove the first child node to ensure the container has at most 4 children
        outputContainer.removeChild(outputContainer.firstChild);
    }

    // Append the new div to the output container
    outputContainer.appendChild(newDiv);

    // Clear the input fields
    document.getElementById("weights").value = '';
    document.getElementById("goalW").value = '';
    }
  }

  circle.innerHTML = percent + " %";

});




//Workout progress

const addBTNWorkout = document.querySelector('.addWorkoutBtn');
const inputContWorkout = document.getElementById("input-workout-progress");

addBTNWorkout.addEventListener('click', function(){
  inputContWorkout.classList.add("showsWorkoutInput");

  addBTNWorkout.classList.add("hideWorkoutBtn");
});

document.getElementById("xBtnProg").addEventListener('click', function(){
  inputContWorkout.classList.remove("showsWorkoutInput");
  addBTNWorkout.classList.remove("hideWorkoutBtn");
});


document.getElementById("addBtnExercises").addEventListener('click', function(){
  const firstInput = document.getElementById("done").value;
  const secondInput = document.getElementById("length").value;
  const percentage = (firstInput / secondInput  * 100).toFixed(0);
  const circleConts = document.getElementById("circleContainer");

  if (!isNaN(percentage)) {
  if (percentage) {
    // Create a new div element to contain the output
    const newDivs = document.createElement('div');
    newDivs.className = 'outConts';

    // Set the inner HTML of the new div
    newDivs.innerHTML = 
        `<div>${new Date().toLocaleDateString()}</div>` + // Current date
        firstInput + " Exercises" +                        // First input followed by " Exercises"
        `<div>  </div>` +                                  // Empty div for spacing
        percentage + " %";     
        
    // Get the output container element
    const outputContainer = document.getElementById('outCont');

    // Check if there are already 4 or more child nodes in the output container
    if (outputContainer.childNodes.length >= 4) {
        // Remove the first child node to ensure the container has at most 4 children
        outputContainer.removeChild(outputContainer.firstChild);
    }

    // Append the new div to the output container
    outputContainer.appendChild(newDivs);

    // Clear the input fields
    document.getElementById("done").value = '';
    document.getElementById("length").value = '';
    }
  }

  circleConts.innerHTML = percentage + " %";

});


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