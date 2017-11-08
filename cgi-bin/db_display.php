<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Search Order</title>
</head>
<body>

<h1>Oder Search Results</h1>
<hr />
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$hostname = "localhost";
$username = "cs20120863";
$password = "dbpass";
$dbname = "db20120863";

$connect = new mysqli($hostname, $username, $password, $dbname)
     or die("DB Connection Failed");

if($connect) {
 echo("MySQL Server Connect Success!<br />");
}
else {
 echo("MySQL Server Connect Failed!");
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

$sql = "SELECT * FROM PizzaOrders WHERE '$column_name' = '$value'"
$result = $connect->query($sql);

// echo "<table style='width:100%'>
//   <tr>
//     <th>Id Number</th>
//     <th>Name</th>
//     <th>Email</th>
//     <th>Phone Number</th>
//     <th>Topping1</th>
//     <th>Topping2</th>
//     <th>Topping3</th>
//     <th>Pay Method</th>
//     <th>Call First</th>
//   </tr>
//   <tr>
// "

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    // echo "
    //     <td>" $row["idnumber"] "</td>
    //     <td>" $row["name"] "</td>
    //     <td>" $row["email"] "</td>
    //     <td>" $row["phone_number"] "</td>
    //     <td>" $row["topping1"] "</td>
    //     <td>" $row["topping2"] "</td>
    //     <td>" $row["topping3"] "</td>
    //     <td>" $row["pay_method"] "</td>
    //     <td>" $row["call_first"] "</td>
    // "
  }
}


// echo "
//   </tr>
//   </table>
// "


$connect->close() ;




?>


</body>
</html>
