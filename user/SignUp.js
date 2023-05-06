const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent the form from submitting
  const pw1 = document.getElementById('pw1')
  const pw2 = document.getElementById('pw2')
  
  if (pw1.value == pw2.value) {
    form.submit()
  }
  else {
      window.alert("Passwords do not match. Please enter the fields again.")
      pw1.value = ''
      pw2.value = ''
      pw1.style.border = '1px solid red'
      pw2.style.border = '1px solid red'
    }
});

const urlParams = new URLSearchParams(window.location.search);
const userid = urlParams.get('userid');
const duplicate_name = urlParams.get('duplicate_name');
const message = `Here is your ID: ${userid}. Please remeber the ID for login purpose!`;


if (userid) {
  // toastFunction();
  window.alert(message)
  
  window.location.href = "Login.html";
  
}

if (duplicate_name){
  window.alert('The name have been used! Please enter a new one!');
}

// function toastFunction(){
//   document.getElementById("toast"),innerHTML = `Sign Up Successfully!<br>Your account ID:${userid}(Please remeber the account ID to login!)`
//   var x = document.getElementById("toast");
//   x.className = "show";
// }
// setTimeout(function(){ x.className = x.className.replace("show", ""); }, 100000);
