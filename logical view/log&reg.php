<?php
session_start();
if(isset($_SESSION['email'])){
	header("Location: index.php?message=Ju jeni te loguar ne App!");
  exit();
}else{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Js/validation.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
  <?php
    if (isset($_GET['message'])) :
        echo '<script>
              function showAlert(message) {
                Swal.fire({
                    icon: "warning",
                    title: "Alert",
                    text: message,
                });
              }
              showAlert("' . $_GET['message'] . '");
              </script>';
    endif;
  ?>
    <div class="container">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="images/frontImg.jpg" alt="">
          <div class="text">
            <span class="text-1">Ju vetëm shkruani <br> dhe ne flasim për ju!</span>
            <span class="text-2">Le të lidhemi!</span>
          </div>
        </div>
        <div class="back">
          <img class="backImg" src="images/backImg.jpg" alt="">
          <div class="text">
            <span class="text-11">Nis udhëtimin e kënaqësisë<br> me një hap</span>
            <span class="text-22">Le të fillojmë</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Kyqu</div>
            <form name="loginForm" action="DB&OOP/loginDB.php" onsubmit="return validateLoginForm()" method="POST">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="text"><a href="#">Keni harruar fjalëkalimin?</a></div>
                <div class="button input-box">
                  <input type="submit" name="loginBtn" value="Sumbit">
                </div>
                <div class="text sign-up-text">Nuk keni llogari? <label for="flip">Regjistrohuni tani</label></div>
              </div>
            </form>
          </div>
          <div class="signup-form">
            <div class="title">Regjistrohuni</div>
            <form name="signupForm" action="DB&OOP/controller/registerController.php" onsubmit="return validateSignupForm()" method="POST">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="name" placeholder="Shëno emrin tuaj" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Shëno emailin tuaj" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Shëno passwordin tuaj" required>
                </div>
                <div class="button input-box">
                  <input type="submit" name="registerBtn" value="regjistrohu">
                </div>
                <div class="text sign-up-text">Keni llogari të hapur? <label for="flip">Kyquni tani</label></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
}
?>