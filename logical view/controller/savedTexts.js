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