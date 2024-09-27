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
  
  
  
  let workoutData = {};
  let currentDay = 'monday'; // Default day
  
  // Load workout data from localStorage when the page loads
  window.onload = function() {
      loadWorkoutData();
      setDay(currentDay); // Load the current day's data
  };
  
  // Save the current day's data to workoutData and localStorage
  function saveData() {
      const tableRows = document.querySelectorAll('#workout-table tr');
      const dayData = [];
  
      // Loop through the rows and save the workout data
      for (let i = 1; i < tableRows.length; i++) {
          const inputs = tableRows[i].querySelectorAll('input');
          dayData.push({
              workout: inputs[0].value,
              reps: inputs[1].value,
              sets: inputs[2].value,
              kilo: inputs[3].value,
              minutes: inputs[4].value
          });
      }
  
      // Save the day title and current day's data
      const dayTitle = document.getElementById('day-title').value;
  
      // Store the dayTitle and workouts under the current day in workoutData
      workoutData[currentDay] = {
          dayTitle: dayTitle,  // Store the title
          workouts: dayData    // Store the workout data array
      };
  
      // Save to localStorage
      saveWorkoutData();
  
  }
  
  // Load workout data and day title for a specific day
  function loadDayData(day) {
      const dayData = workoutData[day];
  
      // Load day title
      const dayTitle = dayData?.dayTitle || '';
      document.getElementById('day-title').value = dayTitle;
  
      // Load workout data if available
      if (dayData?.workouts) {
          const tableRows = document.querySelectorAll('#workout-table tr');
          for (let i = 1; i < tableRows.length; i++) {
              const inputs = tableRows[i].querySelectorAll('input');
              if (dayData.workouts[i - 1]) {
                  inputs[0].value = dayData.workouts[i - 1].workout || '';
                  inputs[1].value = dayData.workouts[i - 1].reps || '';
                  inputs[2].value = dayData.workouts[i - 1].sets || '';
                  inputs[3].value = dayData.workouts[i - 1].kilo || '';
                  inputs[4].value = dayData.workouts[i - 1].minutes || '';
              }
          }
      }
  }
  
  // Set and load the data for the selected day
  function setDay(day) {
      currentDay = day;
      localStorage.setItem('currentDay', day); // Save the current day to localStorage
  
      // Clear existing table data
      clearTable();
  
      // Load data for the selected day
      if (workoutData[day]) {
          loadDayData(day);
      } else {
          // If no data, clear the title input
          document.getElementById('day-title').value = '';
      }
  }
  
  // Save workout data to localStorage
  function saveWorkoutData() {
      localStorage.setItem('userWorkouts', JSON.stringify(workoutData));
  }
  
  // Load workout data from localStorage
  function loadWorkoutData() {
      const storedData = localStorage.getItem('userWorkouts');
      if (storedData) {
          workoutData = JSON.parse(storedData);
      }
  
      // Load the last selected day from localStorage
      const storedDay = localStorage.getItem('currentDay');
      if (storedDay) {
          currentDay = storedDay;
      }
  }
  
  // Clear the table inputs when switching days
  function clearTable() {
      const inputs = document.querySelectorAll('.workoutInputs');
      inputs.forEach(input => {
          input.value = '';
      });
  }
  
  // Handle the Save button click
  document.getElementById('save-btn').addEventListener('click', saveData);
  
  