function validateLoginForm() {
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;
  
    if (email == "") {
      showAlert("Please enter your email");
      return false;
    } else if (!validateEmail(email)) {
        showAlert("Please enter a valid email");
        return false;
    }
  
    if (password == "") {
      showAlert("Please enter your password");
      return false;
    } else if (password.length < 8 || password.length > 12) {
        showAlert("Password should be between 8 and 12 characters");
        return false;
    }
  
    return true;
}

function validateSignupForm() {
    var name = document.forms["signupForm"]["name"].value;
    var email = document.forms["signupForm"]["email"].value;
    var password = document.forms["signupForm"]["password"].value;
  
    if (name == "") {
      showAlert("Please enter your name");
      return false;
    }
  
    if (email == "") {
      showAlert("Please enter your email");
      return false;
    } else if (!validateEmail(email)) {
        showAlert("Please enter a valid email");
        return false;
    }
  
    if (password == "") {
      showAlert("Please enter your password");
      return false;
    } else if (password.length < 8 || password.length > 12) {
        showAlert("Password should be between 8 and 12 characters");
        return false;
    }
  
    return true;
}

function validateEmail(email) {
    var emailRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    return emailRegex.test(email);
}

function showAlert(message) {
    Swal.fire({
        icon: 'warning',
        title: 'Alert',
        text: message,
    });
}