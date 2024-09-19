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


//Profile
const profEdit = document.getElementById("profile");

document.getElementById("editbtnProfs").addEventListener('click', function(){
  profEdit.classList.add("showProfEdit");
});

document.getElementById("sbmt").addEventListener('click', function() {
  const FN = document.getElementById("FN").value;
  const age = document.getElementById("age").value;
  const address = document.getElementById("address").value;
  const LN = document.getElementById("LN").value;
  const gender = document.querySelector('input[name="gender"]:checked').value;
  const contact = document.getElementById("contact").value;
  const email = document.getElementById("email").value;

  const FNo = document.getElementById("username");
  const ageo = document.getElementById("userage");
  const addresso = document.getElementById("useraddress");
  const gendero = document.getElementById("usergender");
  const contacto = document.getElementById("usercontacts");
  const emailo = document.getElementById("useremail");

  FNo.textContent = FN + " " + LN;
  ageo.textContent = age;
  addresso.textContent = address;
  gendero.textContent = gender;
  contacto.textContent = contact;
  emailo.textContent = email;

  profEdit.classList.remove("showProfEdit");
});


