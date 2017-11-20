<?php

$hostname = "localhost";
$username = "cs20120863";
$password = "dbpass";
$dbname = "db20120863";

$connect = new mysqli($hostname, $username, $password, $dbname)
     or die("DB Connection Failed");

if($connect) {
//  print("MySQL Server Connect Success!");
}
else {
 print("MySQL Server Connect Failed!");
}

$value = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $column_name = $_GET["column_name"];
  $value = test_input($_GET["value"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "SELECT * FROM PizzaOrders WHERE ".$column_name." = '$value'";
$result = $connect->query($sql);

$json_return = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($json_return, [
        "order_number" => $row["ordernumber"],
        "id_number" => $row["idnumber"],
        "name" => $row["name"],
        "email" => $row["email"],
        "phone_number" => $row["phone_number"],
        "topping1" => $row["topping1"],
        "topping2" => $row["topping2"],
        "topping3" => $row["topping3"],
        "pay_method" => $row["pay_method"],
        "call_first" => $row["call_first"]
    ]);
  }
    echo json_encode($json_return);
} else {
    echo json_encode(["msg" => "결과가 없습니다."]);
}
