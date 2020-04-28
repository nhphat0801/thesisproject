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
$result = mysqli_query($con,"SELECT * FROM target WHERE Protein_name = '$name'");
$row = mysqli_fetch_assoc($result);
if (is_null($row)) {
$test="Not found";
}

$query_herb = "SELECT * FROM herb WHERE ID IN (".$row['Herb'].")";
$result_herb = mysqli_query($con,$query_herb);
$row_herb = mysqli_fetch_all($result_herb,MYSQLI_ASSOC);

$query_compound = "SELECT * FROM compound WHERE ID IN (".$row['Compound'].")";
$result_compound = mysqli_query($con,$query_compound);
$row_compound = mysqli_fetch_all($result_compound,MYSQLI_ASSOC);



?>