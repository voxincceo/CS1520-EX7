<!DOCTYPE html> 
<html>
  <head>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>LEK70 CS1520 Exercise 7</title>
  </head>
  <body>
    <?php
    echo '<button onclick="checkForm()">Toggle Data</button>
    <div id="empty">
    </div>';
    ?>
    <script type="text/javascript">
      var xhttp;
      var toggle = 0;
      function checkForm()
      {
        if(xhttp == null)
        {
          xhttp = new XMLHttpRequest();
          xhttp.open("POST", "getData.php", true);
          var filename = "file=file1.txt";
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
          xhttp.send(filename);

          xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                  toggle = 0;
                  document.getElementById("empty").innerHTML = xhttp.responseText;
              }
          };
        }
        else
        {
          if(toggle == 1)
          {
            document.getElementById("empty").innerHTML = xhttp.responseText + "</br> This element was already downloaded.";
            toggle = 0;
          }
          else
          {
            document.getElementById("empty").innerHTML = "";
            toggle = 1;
          }
        }
      }
    </script>
  </body>
</html>