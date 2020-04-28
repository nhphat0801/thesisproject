<?php
include ("../header.php");
?>

<div class="container" style="padding-top: 100px;">
<table id="tab" class="display compact cell-border">
	<thead>
		<th style="text-align: center;color: #777; font-weight: bold; width: 3%;">ID</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 15%;">Scientific Name</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 10%;">Familia</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 15%;">Vietnamese Name</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 42%;">Other Vietnamese Names</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 15%;">Image</th>
	</thead>
	<tbody>
		<?php  
		$con = mysqli_connect("localhost", "root", "", "vhm") or die('Lỗi kết nối');
		$query = "SELECT ID, Scientific_name, Familia, Vietnamese_name, Other_vietnamese_names, Image_link0  FROM herb ORDER BY id";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) {
			echo "
			<tr>
			<td>".$row['ID']."</td>
			<td>
				<p><b>".$row['Scientific_name']."</b></p>
				<form autocomplete='off' action=../herb_result/index.php method='post' id='myForm'>
    				<input class='myInput' type='text' name='name' value='".$row['Scientific_name']."' readonly>
    				<input type=submit value='See more information'><br><br>
    			</form>
			</td>
			<td>".$row['Familia']."</td>
			<td>".$row['Vietnamese_name']."</td>
			<td>".$row['Other_vietnamese_names']."</td>
			<td><img src=".$row['Image_link0']." style='width: 170px; height: 200px; display: inline-block;'></td>
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