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
  const equipGif = document.getElementById('equip-gif');
  const equipForm = document.getElementById('equip-form');

  switch (equipment) {
    case 'Equipment1':
      equipImage.src = '../assets/Suspension trainers.png';
      equipText.innerHTML = '<h1>Suspension trainers</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      equipGif.src = '../GIFS/suspension-trainer.gif';
      equipForm.src = '../GIFS/suspesion trainers.jpg';
      break;
    case 'Equipment2':
      equipImage.src = '../assets/Medicine balls.png';
      equipText.innerHTML = '<h1>Medicine balls</h1><br><p>Medicine balls are weighted balls that are used for a variety of strength and conditioning exercises. They add intensity to workouts and help improve core strength, power, and coordination.</p><br><br><h3>How to use it:</h3><br><p>~ Use the medicine ball for a variety of exercises, such as slams, chest passes, and Russian twists.</p><br><p>~ Focus on power, accuracy, and core engagement.</p>';
      equipGif.src = '../GIFS/medicine ball.gif';
      equipForm.src = '../GIFS/medicine ball.png';
      break;
    case 'Equipment3':
      equipImage.src = '../assets/Yoga mats.png';
      equipText.innerHTML = '<h1>Yoga mats</h1><br><p>Yoga mats provide a comfortable and supportive surface for yoga, Pilates, and stretching exercises. They are essential for floor-based workouts and help prevent injuries.</p><br><br><h3>How to use it:</h3><br><p>~  Place the mat on a flat, stable surface.</p><br><p>~  Follow the instructions for yoga poses or Pilates exercises.</p><br><p>~ Focus on proper alignment and breathing.</p>';
      equipGif.src = '../GIFS/yoga mat.gif';
      equipForm.src = '../GIFS/yogamat.png';
      break;
    case 'Equipment4':
      equipImage.src = '../assets/dumbbellss1.png';
      equipText.innerHTML = '<h1>Dumbbells</h1><br><p>Dumbbells are handheld weights used for strength training. They typically consist of a short bar with weights attached to each end. Dumbbells are versatile pieces of equipment that can be used to target various muscle groups and perform a wide range of exercises.</p> <br><br> <h3>How to use it:</h3><br><p>~ Choose the appropriate weight. Start with a weight that you can comfortably lift for 12-15 repetitions.</p> <br> <p>~ Maintain proper form. Focus on controlled movements and avoid using momentum.</p> <br ><p>~ Engage your core. Keep your core muscles engaged throughout the exercise to stabilize your body.</p> <br> <p>~ Breathe deeply. Inhale as you lower the weight and exhale as you lift it. </p><br><p>~ Start with basic exercises. Begin with simple exercises like bicep curls, tricep extensions, and shoulder presses.</p> <br> <p>~ Gradually increase weight and resistance. As you get stronger, increase the weight of your dumbbells.</p> <br> <p>~ Vary your workouts. Incorporate different exercises and rep ranges to challenge your muscles.</p>';
      equipGif.src = '../GIFS/dumbbell.gif';
      equipForm.src = '../GIFS/Dumbbells.jpg';
      break;
    case 'Equipment5':
      equipImage.src = '../assets/Resistance bands.png';
      equipText.innerHTML = '<h1>Resistance Bands</h1><br><p> Resistance bands are elastic bands that provide resistance for strength training exercises. They are portable, versatile, and ideal for home workouts or travel.</p><br><br><h3>How to use it:</h3><br><p> ~ Anchor the band to a secure object or use a door anchor.</p><br><p>~ Perform a variety of exercises, such as rows, bicep curls, and squats.</p><br><p>~ Adjust the resistance by choosing a different band or changing the position of your body.</p>';
      equipGif.src = '../GIFS/resistant band2.gif';
      equipForm.src = '../GIFS/resistant band2.webp';
      break;
    case 'Equipment6':
      equipImage.src = '../assets/kettles.png';
      equipText.innerHTML = '<h1>Kettlebells</h1><br><p>Kettlebells are cast-iron weights with a handle that are used for a variety of strength and conditioning exercises. They offer a full-body workout that combines cardiovascular and strength training benefits.</p><br><br><h3>How to use it:</h3><br><p>~ Use a variety of kettlebell exercises, such as swings, squats, and cleans.</p><br><p>~ Focus on power and explosiveness in your movements.</p><br><p>~ Start with a lighter kettlebell and gradually increase the weight.</p>';
      equipGif.src = '../GIFS/kettlebellswing.gif';
      equipForm.src = '../GIFS/kettlebellswing.jpg';
      break;
    case 'Equipment7':
      equipImage.src = '../assets/Barbells.png';
      equipText.innerHTML = '<h1>Barbells</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Choose the appropriate weight. Start with a weight that you can comfortably lift for 8-12 repetitions.</p> <br> <p>~ Use a spotter. When lifting heavy weights, have a spotter nearby to assist you.</p> <br ><p>~ Maintain proper form and technique. Focus on using proper form to avoid injuries.</p> <br> <p>~ Engage your core and legs: Many barbell exercises involve multiple muscle groups, so engage your core and legs for maximum effectiveness.</p><br><p>~ Start with basic exercises. Begin with fundamental exercises like squats, deadlifts, and bench presses.</p> <br> <p>~ Gradually increase weight and resistance. As you get stronger, increase the weight of your barbells.</p> <br> <p>~ Vary your workouts.Incorporate different exercises and rep ranges to challenge your muscles.</p>';
      equipGif.src = '../GIFS/barbells2.webp';
      equipForm.src = '../GIFS/barbells.png';
      break;
    case 'Equipment8':
      equipImage.src = '../assets/Stationary bikes.png';
      equipText.innerHTML = '<h1>Stationary bikes</h1><br><p>Stationary bikes offer a stationary cycling experience, providing a low-impact cardiovascular workout that is easy on the joints. They are suitable for individuals of all fitness levels and can be used for both endurance training and interval workouts.</p><br><br><h3>How to use it:</h3><br><p>~ Adjust the seat height and handlebar position for comfort.</p><br><p>~ Pedal smoothly and at a consistent pace.</p><br><p>~ Use the resistance knob to increase or decrease the intensity.</p>';
      equipGif.src = '../GIFS/Stationary bike2.gif';
      equipForm.src = '../GIFS/stationary bike.jpg';
      break;
    case 'Equipment9':
      equipImage.src = '../assets/Ellipticaltrainers.png';
      equipText.innerHTML = '<h1>Elliptical trainers</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      equipGif.src = '../GIFS/Elliptical trainers.gif';
      equipForm.src = '../GIFS/Elliptical trainers.jpg';
      break;
    case 'Equipment10':
      equipImage.src = '../assets/Treadmills.png';
      equipText.innerHTML = '<h1>Treadmills</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      equipGif.src = '../GIFS/Treadmills.gif';
      equipForm.src = '../GIFS/treadmills.webp';
      break;
    case 'Equipment11':
      equipImage.src = '../assets/Rowing_machines.png';
      equipText.innerHTML = '<h1>Rowing machines</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      equipGif.src = '../GIFS/Rowing machines.gif';
      equipForm.src = '../GIFS/Rowing machines.jpg';
      break;
    case 'Equipment12':
      equipImage.src = '../assets/pylobox.png';
      equipText.innerHTML = '<h1>Plyo Box</h1><br><p>Suspension trainers are systems of straps that allow for bodyweight exercises in various positions. They offer a versatile and challenging workout that can be adapted to different fitness levels.</p><br><br><h3>How to use it:</h3><br><p>~ Anchor the suspension trainer to a secure point, such as a ceiling or doorframe.</p><br><p>~ Adjust the straps to the desired height.</p><br><p>~ Perform a variety of exercises, such as rows, push-ups, and planks.</p>';
      equipGif.src = '../GIFS/Pylo Box.gif';
      equipForm.src = '../GIFS/Pylo Box2.png';
      break;
    case 'Equipment13':
      equipImage.src = '../assets/benchgym.png';
      equipText.innerHTML = '<h1>Bench</h1><br><p>A bench is a versatile piece of gym equipment that can be used for various exercises, primarily those involving the upper body. Its commonly used for bench presses, dumbbell presses, and other chest exercises. You can also adjust the bench to incline or decline positions to target different muscle groups.</p><br><br><h3>How to use it:</h3><br><p>~ Adjust the bench to the desired angle (flat, incline, or decline).</p><br><p>~ Lie on the bench with your back flat and feet flat on the floor.</p><br><p>~ Grip the barbell or dumbbells with a firm grip.</p><br><p>~ Lower the weight slowly and controlled, then press it back up to the starting position.</p>';
      equipGif.src = '../GIFS/bench2.gif';
      equipForm.src = '../GIFS/bench.jpg';
      break;
    case 'Equipment14':
      equipImage.src = '../assets/legpress.png';
      equipText.innerHTML = '<h1>Leg Press Machine</h1><br><p>The leg press machine is a weight training equipment used to strengthen the legs, primarily targeting the quadriceps, hamstrings, and glutes. Its a versatile machine that can be used to build muscle mass, improve lower body power, and rehabilitate injuries.</p><br><br><h3>How to use it:</h3><br><p>~ Sit on the machine and place your feet shoulder-width apart on the platform.</p><br><p>~ Adjust the seat height to ensure your knees are at a 90-degree angle when the platform is fully lowered.</p><br><p>~ Grip the handles on either side of the machine.</p><br><p>~ Slowly lower the platform until you feel a stretch in your legs.</p><br><p>~ Push the platform back up to the starting position.</p>';
      equipGif.src = '../GIFS/leg press machine2.gif';
      equipForm.src = '../GIFS/leg press machine.jpg';
      break;
    case 'Equipment15':
      equipImage.src = '../assets/preacher machine.png';
      equipText.innerHTML = '<h1>Preacher Curl Bench</h1><br><p>The preacher curl bench is a specialized bench with a padded armrest designed to isolate and target the biceps. Its often used by bodybuilders and weightlifters to improve bicep definition and peak.</p><br><br><h3>How to use it:</h3><br><p>~ Sit on the preacher curl bench and place your elbows on the padded armrest.</p><br><p>~ Hold a barbell or dumbbells with a neutral grip.</p><br><p>~ Curl the weight up towards your chest, keeping your elbows stationary.</p><br><p>~ Slowly lower the weight back down to the starting position.</p>';
      equipGif.src = '../GIFS/preacher curl bench.webp';
      equipForm.src = '../GIFS/preacher curl bench.jpg';
      break;
    case 'Equipment16':
      equipImage.src = '../assets/shoulder.png';
      equipText.innerHTML = '<h1>Shoulder Press Machine</h1><br><p>The shoulder press machine is a weight training equipment used to strengthen the shoulders, primarily targeting the deltoids. Its a versatile machine that can be used to build muscle mass, improve upper body strength, and enhance overall shoulder development.</p><br><br><h3>How to use it:</h3><br><p>~ Sit on the shoulder press machine and adjust the seat height to ensure the handles are at a comfortable level.</p><br><p>~ Grip the handles with a neutral grip.</p><br><p>~ Press the handles up overhead until your arms are fully extended.</p><br><p>~ Slowly lower the handles back down to the starting position.</p>';
      equipGif.src = '../GIFS/shoulder press machine.gif';
      equipForm.src = '../GIFS/shoulder press machine.png';
      break;
    case 'Equipment17':
      equipImage.src = '../assets/tire.png';
      equipText.innerHTML = '<h1>Tire Flip Machine</h1><br><p>The tire flip machine is a unique piece of equipment that simulates the action of flipping a tire. It provides a full-body workout, targeting multiple muscle groups and improving strength, power, explosiveness, cardiovascular fitness, and coordination.</p><br><br><h3>How to use it:</h3><br><p>~ Position yourself in front of the tire flip machine.</p><br><p>~ Grip the handles on the sides of the tire.</p><br><p>~ Bend your knees and lower your body into a squat position.</p><br><p>~ Push up explosively with your legs and use your arms to flip the tire over.</p><br><p>~ Repeat the movement, catching the tire on the other side.</p>';
      equipGif.src = '../GIFS/Tire_Workout_Tire_Flip.webp';
      equipForm.src = '../GIFS/TireFlip-180-5.jpg';
      break;
      case 'Equipment18':
        equipImage.src = '../assets/leg.png';
        equipText.innerHTML = '<h1>Seated Leg Extension Machine</h1><br><p>The seated leg extension machine is a weight training equipment specifically designed to isolate and strengthen the quadriceps. Its a popular choice for building muscle mass and rehabilitating injuries to the knee.</p><br><br><h3>How to use it:</h3><br><p>~ Sit on the machine and place your shins under the padded lever.</p><br><p>~ Grip the handles with a neutral grip.</p><br><p>~ Press the handles up overhead until your arms are fully extended.</p><br><p>~ Slowly lower the handles back down to the starting position.</p>';
        equipGif.src = '../GIFS/seated leg extension machine2.gif';
        equipForm.src = '../GIFS/seated leg extension machine2.jpg';
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
