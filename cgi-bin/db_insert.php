<html>
<head>

  <title>Data Added</title>
    <style>

    table, th, td {
        border: 1px solid black
    }
    </style>
</head>
<body>

<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

echo ("MySQL - PHP Connect Test <br/>");
$hostname = "localhost";
$username = "cs20120863";
$password = "dbpass";
$dbname = "db20120863";

$connect = new mysqli($hostname, $username, $password, $dbname)
     or die("DB Connection Failed");
//$result = mysql_select_db($dbname,$connect);

if($connect) {
 // echo("MySQL Server Connect Success!<br />");
}
else {
 echo("MySQL Server Connect Failed!");
}

// define variables and set to empty values
$idnumber = $name = $email = $phone = $topping1 = $topping2 = $topping3 =
   $paymethod  = $callfirst = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $idnumber = test_input($_POST["idnumber"]);
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $topping1 = test_input( $_POST['topping1']);
  $topping2 = test_input( $_POST['topping2']);
  $topping3 = test_input( $_POST['topping3']);
  $paymethod = test_input($_POST["paymethod"]);
  $callfirst = test_input($_POST["callfirst"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO PizzaOrders (idnumber, name, email, phone_number, topping1, topping2, topping3, pay_method, call_first)
VALUES ('$idnumber', '$name', '$email', '$phone', '$topping1', '$topping2', '$topping3', '$paymethod', '$callfirst')";

if ($connect ->query($sql) === TRUE) {
  echo "New record created successfully";
  echo "<table style='width:100%'> <tr><th>Id Number</th> <th>Name</th><th>Email</th><th>Phone Number</th><th>Topping1</th> <th>Topping2</th><th>Topping3</th><th>Pay Method</th><th>Call First</th></tr>";
  echo "<tr><td>".$idnumber."</td><td>".$name."</td><td>".$row["name"]."</td><td>".$email."</td><td>".$phone."</td> <td>".$topping1."</td><td>".$topping2."</td><td>".$topping3."</td><td>".$paymethod."</td><td>".$callfirst."</td></tr>";
} else {
  echo "Error: ". $sql . "<br>" . $connect ->error;
}

$connect->close() ;

  echo "<a href='/search.html'>주문 검색하러 가기</a>"

?>



</body>
</html>
