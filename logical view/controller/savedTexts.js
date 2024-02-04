function fetchDataFromPHPFile() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var fileContent = this.responseText;
        console.log(fileContent);
      }
    };
    xhttp.open("GET", "DB&OOP/view/savedTexts.php", true);
    xhttp.send();
  }

  // Ky kontroller sherben per të bërë fetch të dhenat prej modelit pra fajllit loginModel.php/Model) dhe i ben push ne view
  // qe ne kete rast eshte ne fajllin index.php.