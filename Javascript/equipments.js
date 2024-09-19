// nav bar
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

function showEquipment(equipment) {
  const description = document.getElementById('description');
  const equipImage = document.getElementById('equip-image');
  const equipText = document.getElementById('equip-text');

  switch (equipment) {
      case 'Equipment1':
          equipImage.src = '../assets/Dumbbells.jpg'; 
          equipText.innerText = 'A dumbbell is a type of free weight that is used in weight training.';
          break;
      case 'Equipment2':
          equipImage.src = '../assets/Kettlebells .jpg'; 
          equipText.innerText = 'A treadmill is a machine for walking or running while staying in one place.';
          break;
      case 'Equipment3':
          equipImage.src = '../assets/chest press machine.jpg'; 
          equipText.innerText = 'A bench press is a piece of equipment used for strength training.';
          break;
      case 'Equipment4':
          equipImage.src = '../assets/Treadmills and Stationary bikes.jpg'; // Replace with actual image URL
          equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
          break;
      case 'Equipment5':
        equipImage.src = '../assets/back extension machine..jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment6':
        equipImage.src = '../assets/shoulder press machine.jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment7':
        equipImage.src = '../assets/yoga mats.jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment8':
        equipImage.src = '../assets/preacher curl bench.jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment9':
        equipImage.src = '../assets/leg curl and leg extension machine..jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment10':
        equipImage.src = '../assets/plyo soft boxes..jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment11':
        equipImage.src = '../assets/seated cable row machinee.jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      case 'Equipment12':
        equipImage.src = '../assets/Medicine balls.jpg'; // Replace with actual image URL
        equipText.innerText = 'A barbell is a long bar with weights at both ends, used for weightlifting.';
        break;
      default:
          equipImage.src = '';
          equipText.innerText = '';
  }

  description.style.visibility = 'visible';
  

}

document.getElementById("quitBTN").addEventListener('click', function(){
  description.style.visibility = 'hidden';
});
