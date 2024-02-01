<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online TTS</title>
    <link rel="stylesheet" type="text/css" href="Css/topcoat-mobile-light.min.css">
    <link rel="stylesheet" type="text/css" href="Css/styles.css">
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=R06QTECg"></script>
    <script type="text/javascript" src="Js/mousetrap.min.js"></script>
    <script type="text/javascript" src="Js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function validateForm() {
            var clickedButton = document.getElementById('clicked-button').value;
    
            if (clickedButton === 'ruaj') {
                return true;
            } else {
                return false;
            }
        }
        function logout() {
        // Make an AJAX request to logout.php
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "DB&OOP/logout.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Redirect to index.php after successful logout
                window.location.href = 'index.php';
            }
            };
            xhr.send();
        }
        function login() {
            window.location.href = 'DB&OOP/view/log&reg.php';
        }
    </script>
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
    <div class="bigBody">
        <div class="sidebar">
            <br><br><hr>
            <?php
				if(isset($_SESSION['name']) || isset($_SESSION['email'])){ ?>
                    <button onclick="logout()">Shkyçu</button>
                    <button onclick="window.location.href='DB&OOP/view/savedTexts.php'" class="button-link">Shiko tekstet e ruajtura</button>
			<?php
				}else{?>
                    <button onclick="login()">Identifikohu</button>
			<?php }?>
        </div>
        <div class="sideDiv">
            <header>
                <div class="topcoat-navigation-bar">
                    <div class="topcoat-navigation-bar__item center full">
                        <h1 class="topcoat-navigation-bar__title">Albanian TTS</h1>
                    </div>         
                </div>    
            </header>    
            <div class="divChecker">
                <div></div>
                <div><h3 class="checker" onclick="checkSupport()">( Sigurohu që shfletuesi është i gatshëm për përdorim )</h3></div>
                <div></div>
            </div>
            <section class="section">
                <form action="DB&OOP/repository/ttsRepository.php" onsubmit="return validateForm()" method="POST">
                    <textarea id="ttsInput" name="ttsInput" class="topcoat-textarea mousetrap" placeholder="Shkruaj apo kopjo tekst këtu, pastaj shtyp butonin FOL për ta konvertuar tekstin në zë..!"></textarea>

                    <div id="customise-options">
                        <label id="voice-label">
                            Selekto folësin :
                            <div id="voice-container">
                                <select id="select-voice" name="language">
                                    <option value="1">UK Female</option>
                                    <option value="2">UK Male</option>
                                    <option value="3">Albanian Female</option>
                                    <option value="4">Albanian Male</option>                                  
                                </select>                      
                            </div>
                        </label>   
                        <label id="speed-label">
                            Selekto shpejtësinë e të folurit :
                            <div id="speed-container">
                                <input id="select-speed" type="range" class="topcoat-range" min="0" max="1.5" value="1" step="0.1" onchange="setSpeed(this.value)">
                            </div>
                        </label>                                  
                    </div>

                    <div class="button-row">
                        <button id="stop-button" class="topcoat-button" onclick="stopSpeech()">NDALO</button>
                        <button id="speak-button" class="topcoat-button--cta" onclick="startSpeech()">FOL</button> 
                        <button id="save-button" type="submit" class="topcoat-button" name="saveBtn" onclick="document.getElementById('clicked-button').value = 'ruaj';">RUAJ</button>
                        <input type="hidden" id="clicked-button" name="clickedButton" value="">         
                    </div>
                </form>
                <div id="links">
                    <ul>
                        <li>
                            <a href="https://github.com/ahmetb00/Albanian-TTSS" target="_blank">
                                <img src="images/github.png" alt="Logo of github Octocat anchoring to the GitHub page of Albanian-TTSS">
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>
</html>