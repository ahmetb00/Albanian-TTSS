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
return loginFormValidator.validate();
}

// Create an instance of the validator
var loginFormValidator = LoginFormValidatorFactory.createValidator();

// Usage
function validateLoginForm() {
  return loginFormValidator.validate();
}

// Helper function to show alerts
function showAlert(message) {
  alert(message);
}

// Helper function to validate email
function validateEmail(email) {
  // Your email validation logic goes here
  // Example: a simple check for the presence of @ symbol
  return email.includes("@");
}

// state pattern
function validateSignupForm() {
  const form = document.forms["signupForm"];
  const name = form["name"].value;
  const email = form["email"].value;
  const password = form["password"].value;

  const stateContext = {
    currentState: new InitialState(),
    showAlert: (message) => showAlert(message)
  };

  return stateContext.currentState.validate(name, email, password);
}

class InitialState {
  validate(name, email, password) {
    if (name === "") {
      this.showAlert("Please enter your name");
      return false;
    }

    return this.transitionToNextState();
  }

  transitionToNextState() {
    return new EmailValidationState();
  }

  showAlert(message) {
    alert(message);
  }
}

class EmailValidationState {
  validate(name, email, password) {
    if (email === "") {
      this.showAlert("Please enter your email");
      return false;
    } else if (!validateEmail(email)) {
      this.showAlert("Please enter a valid email");
      return false;
    }

    return this.transitionToNextState();
  }

  transitionToNextState() {
    return new PasswordValidationState();
  }

  showAlert(message) {
    alert(message);
  }
}

class PasswordValidationState {
  validate(name, email, password) {
    if (password === "") {
      this.showAlert("Ju lutem shënoni fjalëkalimin tuaj");
      return false;
    } else if (password.length < 8 || password.length > 12) {
      this.showAlert("Fjalëkalimi duhet jetë nga 8 deri 12 karaktere");
      return false;
    }

    return true;
  }

  transitionToNextState() {
    return this; // Final state, no transition
  }

  showAlert(message) {
    alert(message);
  }
}

function validateEmail(email) {
  return true; 
}
// Modeli i gjendjes organizon logjikën e vlefshmërisë në gjendje të ndryshme, secila përgjegjëse për një aspekt specifik të vërtetimit.
// Funksioni validateSignupForm inicializon gjendjen në gjendjen "Initial" dhe thërret logjikën e vlefshmërisë për atë gjendje.
// Nëse vërtetimi është i suksesshëm, ai kalon në gjendjen tjetër, duke përsëritur procesin derisa të arrihet gjendja përfundimtare.
// Çdo shtet i njeh rregullat e tij të vlefshmërisë dhe mund të kalojë në gjendjen tjetër bazuar në suksesin e vërtetimit të gjendjes aktuale.
// Ky model ndihmon në ndarjen e shqetësimeve dhe organizimin e logjikës komplekse, duke e bërë kodin më të mirëmbajtur.

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