// Side bar function
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
  
  //Logout Dropdown
  document.addEventListener("DOMContentLoaded", function() {
    const ddBtn = document.querySelector('.dropDown');
    const ddConts = document.querySelector('.DD-container');
   
    ddBtn.addEventListener('click', function() {
      ddConts.classList.toggle('ddactive');
    });
  });
  
  
  
  
  
  
  // Adding activity
  
  let currentDay = 'monday';
  let isEditable = true;
  const workoutInputs = document.getElementsByClassName("workoutInputs");
  let loadWorkouts = '';
  
  // This object will store workout data for each day
  let workoutData = {
      monday: {},
      tuesday: {},
      wednesday: {},
      thursday: {},
      friday: {},
      saturday: {}
  };
  
  // Load workout data from localStorage
  function loadWorkoutData() {
      const storedData = localStorage.getItem('userWorkouts');
      if (storedData) {
          workoutData = JSON.parse(storedData);
      }
  }
  
  // Save workout data to localStorage
  function saveWorkoutData() {
      localStorage.setItem('userWorkouts', JSON.stringify(workoutData));
  }
  
  function setDay(day) {
      saveCurrentDay();
      currentDay = day;
  
      const dayTitle = workoutData[day].dayTitle || `${capitalizeFirstLetter(day)} - `;
      document.getElementById('day-title').value = dayTitle;
  
      loadDayData(day);
  }
  
  function saveCurrentDay() {
      workoutData[currentDay].dayTitle = document.getElementById('day-title').value;
  
      for (let i = 1; i <= 10; i++) {
          workoutData[currentDay][`workout${i}`] = document.getElementById(`workout${i}`).value;
          workoutData[currentDay][`reps${i}`] = document.getElementById(`reps${i}`).value;
          workoutData[currentDay][`sets${i}`] = document.getElementById(`sets${i}`).value;
          workoutData[currentDay][`kilo${i}`] = document.getElementById(`kilo${i}`).value;
          workoutData[currentDay][`minutes${i}`] = document.getElementById(`minutes${i}`).value;
      }
  
      saveWorkoutData();
  }
  
  function loadDayData(day) {
      for (let i = 1; i <= 10; i++) {
          document.getElementById(`workout${i}`).value = workoutData[day][`workout${i}`] || '';
          document.getElementById(`reps${i}`).value = workoutData[day][`reps${i}`] || '';
          document.getElementById(`sets${i}`).value = workoutData[day][`sets${i}`] || '';
          document.getElementById(`kilo${i}`).value = workoutData[day][`kilo${i}`] || '';
          document.getElementById(`minutes${i}`).value = workoutData[day][`minutes${i}`] || '';
      }
  }
  
  function saveData() {
      if (isEditable) {
          for (let i = 1; i <= 10; i++) {
              document.getElementById(`workout${i}`).disabled = true;
              document.getElementById(`reps${i}`).disabled = true;
              document.getElementById(`sets${i}`).disabled = true;
              document.getElementById(`kilo${i}`).disabled = true;
              document.getElementById(`minutes${i}`).disabled = true;
          }
          document.getElementById('day-title').disabled = true;
          document.getElementById('save-btn').textContent = 'Edit';
          document.getElementById('save-btn').classList.add('edit-mode');
          isEditable = false;
      } else {
          for (let i = 1; i <= 10; i++) {
              document.getElementById(`workout${i}`).disabled = false;
              document.getElementById(`reps${i}`).disabled = false;
              document.getElementById(`sets${i}`).disabled = false;
              document.getElementById(`kilo${i}`).disabled = false;
              document.getElementById(`minutes${i}`).disabled = false;
          }
          document.getElementById('day-title').disabled = false;
          document.getElementById('save-btn').textContent = 'Save';
          document.getElementById('save-btn').classList.remove('edit-mode');
          isEditable = true;
      }
  }
  
  function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
  }
  
  // Load workout data on page load
  window.onload = function() {
      loadWorkoutData();
      setDay(currentDay);
  };
  
  
  
  for (let i = 0; i < workoutInputs.length; i++) {
      loadWorkouts += workoutInputs[i].value + ' '; // or however you want to format it
  }
  
  // Remove trailing comma and space
  loadWorkouts = loadWorkouts.slice(0, -2);
  
  // Now save to localStorage
  localStorage.setItem("workoutLoads", loadWorkouts);
  
  