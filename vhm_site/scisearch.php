<?php
$con = mysqli_connect("localhost", "root", "", "vhm");
if (isset($_POST["query"])) {
$output = '';
$query = "select * from herb where Scientific_name LIKE '%".$_POST["query"]."%'";
$result = mysqli_query($con,$query);
$output = '<ul class="list-unstyled">';
if (mysqli_num_rows($result) > 0) 
{
	while ($row = mysqli_fetch_array($result)){
		$output .= '<li class="list-group-item">'.$row["Scientific_name"].'</li>';
}
}
else{
$output .= '<li>Không tìm thấy dược liệu</li>';
}
$output .= '</ul>';
echo $output;
}
?>