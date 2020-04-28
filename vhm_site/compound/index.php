<?php
include ("../header.php");
?>

<div class="container" style="padding-top: 100px;">
<table id="" class="display compact cell-border">
	<thead>
		<th style="text-align: center;color: #777; font-weight: bold; width: 3%;">ID</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 20%;">Name</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 50%;">IUPAC Name</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 7%;">Formula</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 20%;">Structure</th>
	</thead>
	<tbody>
		<?php  
		$con = mysqli_connect("localhost", "root", "", "vhm") or die('Lỗi kết nối');
		$query = "SELECT * FROM compound ORDER BY id";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>
			<td>".$row['ID']."</td>
			<td>
				<p><b>".$row['Pub_name']."</b></p>
				<form autocomplete=off action=../compound_result/index.php method=post name=myForm>
    				<input class=myInput type=text name=name value='".$row['Pub_name']."'' readonly>
    				<input type=submit value='Detail'>
    			</form>
			</td>
			<td>".$row['Name']."</td>
			<td>".$row['Formula']."</td>
			<td><img src=".$row['Structure']." style='width: 250px; height: 250px; display: inline-block;'></td>
			</tr>
			";
		}

		?>
		
	</tbody>
</table>
</div>

<script type="text/javascript" src="../tab_input.js"></script>
</body>
</html>