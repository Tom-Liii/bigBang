const urlParams = new URLSearchParams(window.location.search);

// const errorMessageElement = document.getElementById('error-message');

const error_message = urlParams.get('login_error');

if (error_message) {
    toastFunction();
//     if (window.alert("Invalid Login ID / Password. Please try again!")) {
//         window.location.href = "Login.html";
//     }
}

function toastFunction() {
    var x = document.getElementById("toast");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }

// let accID = document.getElementById('input');
// localStorage.setItem('ID', JSON.stringify(accID));
// console.log(accID);
