<?php
setcookie("name",$_POST["name"]);
setcookie("email",$_POST["email"]);
?>



<html>
<body>

<?php

if(isset($_POST["name"])){
  echo "Welcome";
  echo $_POST["name"];
  echo "<br>";
  echo "Your email is:";
  echo $_POST["email"];
} else {
  echo "<a>Go back to Login Page</a>";
}

?>


</body>
</html>
