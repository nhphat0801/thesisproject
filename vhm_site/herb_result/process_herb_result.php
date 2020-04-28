<?php
header("content-type: text/html; charset=utf-8");
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name = $errname = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $errname = "<div class='jumbotron'><h2>Enter your search!</h2>
                  <a href='http://localhost/vhm_site/'>Click here to comback Home</a>
    </div>";
    echo $errname;
    return;
  }
  else {
    $name = test_input($_POST["name"]);
  }
}

$con = mysqli_connect("localhost", "root", "", "vhm");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = "SELECT * FROM herb WHERE Vietnamese_name = '$name' or Scientific_name = '$name'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
if (is_null($row)) {
$test="Not found";
}

$query_compound = "SELECT * FROM compound WHERE ID IN (".$row['Compound'].")";
$result_compound = mysqli_query($con,$query_compound);
$row_compound = mysqli_fetch_all($result_compound,MYSQLI_ASSOC);

$query_target = "SELECT * FROM target WHERE ID IN (".$row['Target'].")";
$result_target = mysqli_query($con,$query_target);
$row_target = mysqli_fetch_all($result_target,MYSQLI_ASSOC);
?>
