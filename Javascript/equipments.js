// nav bar
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById('hamburger');
  const nav = document.querySelector('.nav');
  const menu = document.getElementById('menu');

  hamburger.addEventListener('click', function () {
    nav.classList.toggle('expanded');
  });
});

function myFunction(x) {
  x.classList.toggle("change");
}


document.addEventListener("DOMContentLoaded", function () {
  const ddBtn = document.querySelector('.dropDown');
  const ddConts = document.querySelector('.DD-container');

  ddBtn.addEventListener('click', function () {
    ddConts.classList.toggle('ddactive');
  });
});

function showEquipment(equipment) {
  const description = document.getElementById('description');
  const equipImage = document.getElementById('equip-image');
  const equipText = document.getElementById('equip-text');

  switch (equipment) {
    case 'Equipment1':
      equipImage.src = '../assets/Suspension trainers.png';
      equipText.innerHTML = '<h1>Suspension trainers</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      break;
    case 'Equipment2':
      equipImage.src = '../assets/Medicine balls.png';
      equipText.innerHTML = '<h1>Medicine balls</h1><br><p>Medicine balls are weighted balls that are used for a variety of strength and conditioning exercises. They add intensity to workouts and help improve core strength, power, and coordination.</p><br><br><h3>How to use it:</h3><br><p>~ Use the medicine ball for a variety of exercises, such as slams, chest passes, and Russian twists.</p><br><p>~ Focus on power, accuracy, and core engagement.</p>';
      break;
    case 'Equipment3':
      equipImage.src = '../assets/Yoga mats.png';
      equipText.innerHTML = '<h1>Yoga mats</h1><br><p>Yoga mats provide a comfortable and supportive surface for yoga, Pilates, and stretching exercises. They are essential for floor-based workouts and help prevent injuries.</p><br><br><h3>How to use it:</h3><br><p>~  Place the mat on a flat, stable surface.</p><br><p>~  Follow the instructions for yoga poses or Pilates exercises.</p><br><p>~ Focus on proper alignment and breathing.</p>';
      break;
    case 'Equipment4':
      equipImage.src = '../assets/dumbbellss1.png';
      equipText.innerHTML = '<h1>Dumbbells</h1><br><p>Dumbbells are handheld weights used for strength training. They typically consist of a short bar with weights attached to each end. Dumbbells are versatile pieces of equipment that can be used to target various muscle groups and perform a wide range of exercises.</p> <br><br> <h3>How to use it:</h3><br><p>~ Choose the appropriate weight. Start with a weight that you can comfortably lift for 12-15 repetitions.</p> <br> <p>~ Maintain proper form. Focus on controlled movements and avoid using momentum.</p> <br ><p>~ Engage your core. Keep your core muscles engaged throughout the exercise to stabilize your body.</p> <br> <p>~ Breathe deeply. Inhale as you lower the weight and exhale as you lift it. </p><br><p>~ Start with basic exercises. Begin with simple exercises like bicep curls, tricep extensions, and shoulder presses.</p> <br> <p>~ Gradually increase weight and resistance. As you get stronger, increase the weight of your dumbbells.</p> <br> <p>~ Vary your workouts. Incorporate different exercises and rep ranges to challenge your muscles.</p>';
      break;
    case 'Equipment5':
      equipImage.src = '../assets/Resistance bands.png';
      equipText.innerHTML = '<h1>Resistance Bands</h1><br><p> Resistance bands are elastic bands that provide resistance for strength training exercises. They are portable, versatile, and ideal for home workouts or travel.</p><br><br><h3>How to use it:</h3><br><p> ~ Anchor the band to a secure object or use a door anchor.</p><br><p>~ Perform a variety of exercises, such as rows, bicep curls, and squats.</p><br><p>~ Adjust the resistance by choosing a different band or changing the position of your body.</p>';
      break;
    case 'Equipment6':
      equipImage.src = '../assets/kettles.png';
      equipText.innerHTML = '<h1>Kettlebells</h1><br><p>Kettlebells are cast-iron weights with a handle that are used for a variety of strength and conditioning exercises. They offer a full-body workout that combines cardiovascular and strength training benefits.</p><br><br><h3>How to use it:</h3><br><p>~ Use a variety of kettlebell exercises, such as swings, squats, and cleans.</p><br><p>~ Focus on power and explosiveness in your movements.</p><br><p>~ Start with a lighter kettlebell and gradually increase the weight.</p>';
      break;
    case 'Equipment7':
      equipImage.src = '../assets/Barbells.png';
      equipText.innerHTML = '<h1>Barbells</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Choose the appropriate weight. Start with a weight that you can comfortably lift for 8-12 repetitions.</p> <br> <p>~ Use a spotter. When lifting heavy weights, have a spotter nearby to assist you.</p> <br ><p>~ Maintain proper form and technique. Focus on using proper form to avoid injuries.</p> <br> <p>~ Engage your core and legs: Many barbell exercises involve multiple muscle groups, so engage your core and legs for maximum effectiveness.</p><br><p>~ Start with basic exercises. Begin with fundamental exercises like squats, deadlifts, and bench presses.</p> <br> <p>~ Gradually increase weight and resistance. As you get stronger, increase the weight of your barbells.</p> <br> <p>~ Vary your workouts.Incorporate different exercises and rep ranges to challenge your muscles.</p>';
      break;
    case 'Equipment8':
      equipImage.src = '../assets/Stationary bikes.png';
      equipText.innerHTML = '<h1>Stationary bikes</h1><br><p>Stationary bikes offer a stationary cycling experience, providing a low-impact cardiovascular workout that is easy on the joints. They are suitable for individuals of all fitness levels and can be used for both endurance training and interval workouts.</p><br><br><h3>How to use it:</h3><br><p>~ Adjust the seat height and handlebar position for comfort.</p><br><p>~ Pedal smoothly and at a consistent pace.</p><br><p>~ Use the resistance knob to increase or decrease the intensity.</p>';
      break;
    case 'Equipment9':
      equipImage.src = '../assets/Ellipticaltrainers.png';
      equipText.innerHTML = '<h1>Elliptical trainers</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      break;
    case 'Equipment10':
      equipImage.src = '../assets/Treadmills.png';
      equipText.innerHTML = '<h1>Treadmills</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      break;
    case 'Equipment11':
      equipImage.src = '../assets/Rowing_machines.png';
      equipText.innerHTML = '<h1>Rowing machines</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      break;
    case 'Equipment12':
      equipImage.src = '../assets/pylobox.png';
      equipText.innerHTML = '<h1>Pylo Box</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      break;
    default:
      equipImage.src = '';
      equipText.innerText = '';
  }

  description.style.visibility = 'visible';


}

document.getElementById("quitBTN").addEventListener('click', function () {
  description.style.visibility = 'hidden';
});
