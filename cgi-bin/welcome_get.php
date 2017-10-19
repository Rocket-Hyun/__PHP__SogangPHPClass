

<?php
setcookie("name",$_GET["name"]);
setcookie("email", $_GET["email"]);

?>

<html>
<body>


Welcome <?php echo $_COOKIE["name"]; ?> <br>
Your email address is <?php echo $_COOKIE["email"]; ?> <br>


<?php
  if (isset($_GET["SIN"])){
    echo "Your Social Security Number is ",$_GET["SIN"]; 
  } else {
  }
?> <br> <br>


</body>
</html>

