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
  
  
  // Adding description
  const modalL = document.getElementById('modal-left');
  const overlayL = document.getElementById('overlay-left');
  const inputButtonL = document.querySelector('.input-button-left');
  const outputContainerL = document.getElementById('outputContainer-left');
  
  function openModalL() {
      overlayL.style.display = 'block';
      modalL.classList.add('showL');
      document.body.style.overflow = 'hidden';
  }
  
  function closeModalL() {
      modalL.classList.add('hideL');
      modalL.addEventListener('transitionend', () => {
          overlayL.style.display = 'none';
          modalL.classList.remove('showL', 'hideL');
          document.body.style.overflow = 'auto';
      }, { once: true });
  }
  
  overlayL.addEventListener('click', closeModalL);
  document.querySelector('.close-button-left').addEventListener('click', closeModalL);
  
  document.getElementById('add-post-button-left').addEventListener('click', function() {
      const userInputs = document.getElementById('userInput-left').value;
      if (userInputs) {
          const newDiv = document.createElement('div');
          newDiv.className = 'outputDivL';
  
          const span = document.createElement('span');
          span.textContent = userInputs;
          newDiv.appendChild(span);
  
          const deleteBtn = document.createElement('button');
          deleteBtn.textContent = 'Delete';
          deleteBtn.className = 'deleteBtnL';
          newDiv.appendChild(deleteBtn);
  
          deleteBtn.addEventListener('click', function() {
              newDiv.remove();
              if (outputContainerL.children.length === 0) {
                  inputButtonL.style.display = 'block';
              }
          });
  
          outputContainerL.appendChild(newDiv);
          document.getElementById('userInput-left').value = ''; // Clear the input field
          closeModalL(); // Close the modal
          inputButtonL.style.display = 'none'; // Hide the input button
      }
  
      localStorage.setItem('description', userInputs);
      const storage =  localStorage.getItem("description");
      console.log(storage);
  });
  
  
  
  // Adding activity
  const modal = document.getElementById('modal');
  const overlay = document.getElementById('overlay');
  const maxInputs = 12; // Maximum number of inputs allowed
  
  function openModal() {
      overlay.style.display = 'block';
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
  }
  
  function closeModal() {
      modal.classList.add('hide');
      modal.addEventListener('transitionend', () => {
          overlay.style.display = 'none';
          modal.classList.remove('show', 'hide');
          document.body.style.overflow = 'auto';
      }, { once: true });
  }
  
  overlay.addEventListener('click', closeModal);
  document.querySelector('.close-button').addEventListener('click', closeModal);
  
  // Input and output function
  document.getElementById('add-post-button').addEventListener('click', function() {
      const userInput = document.getElementById('userInput').value;
  
      // Get existing outputs
      const outputContainer = document.getElementById('outputContainer');
      const currentEntries = outputContainer.querySelectorAll('.outputDiv');
  
      if (currentEntries.length >= maxInputs) {
          alert("You've reached the maximum limit of 12 inputs. Please delete some entries to add new ones.");
          return; // Exit the function
      }
  
      if (userInput) {
          const newDiv = document.createElement('div');
          newDiv.className = 'outputDiv';
  
          const span = document.createElement('span');
          span.textContent = userInput;
          newDiv.appendChild(span);
  
          const deleteBtn = document.createElement('button');
          deleteBtn.textContent = 'Delete';
          deleteBtn.className = 'deleteBtn';
          newDiv.appendChild(deleteBtn);
  
          deleteBtn.addEventListener('click', function() {
              newDiv.remove();
              // Optional: You could also update the local storage here if needed
          });
  
          outputContainer.appendChild(newDiv);
          document.getElementById('userInput').value = ''; // Clear the input field
  
          // Optionally, store the activity in localStorage
          const activities = JSON.parse(localStorage.getItem('activities')) || [];
          activities.push(userInput);
          localStorage.setItem('activities', JSON.stringify(activities));
      }
  });
  
  // Optionally: Load stored activities when the page loads
  window.onload = function() {
      const activities = JSON.parse(localStorage.getItem('activities')) || [];
      activities.forEach(activity => {
          const newDiv = document.createElement('div');
          newDiv.className = 'outputDiv';
  
          const span = document.createElement('span');
          span.textContent = activity;
          newDiv.appendChild(span);
  
          const deleteBtn = document.createElement('button');
          deleteBtn.textContent = 'Delete';
          deleteBtn.className = 'deleteBtn';
          newDiv.appendChild(deleteBtn);
  
          deleteBtn.addEventListener('click', function() {
              newDiv.remove();
              // Update localStorage as necessary
          });
  
          document.getElementById('outputContainer').appendChild(newDiv);
      });
  };
  