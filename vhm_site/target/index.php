<?php
include ("../header.php");
?>

<div class="container" style="padding-top: 100px;">
<table id="tab" class="display compact table-striped">
	<thead>
		<th style="text-align: center;color: #777; font-weight: bold; width: 5%;">ID</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 50%;">Protein Name</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 25%;">Gene Name</th>
		<th style="text-align: center;color: #777; font-weight: bold; width: 20%;">Uniprot Code</th>
	</thead>
	<tbody>
		<?php  
		$con = mysqli_connect("localhost", "root", "", "vhm") or die('Lỗi kết nối');
		$query = "SELECT * FROM target ORDER BY id";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>
			<td>".$row['ID']."</td>
			<td>
				<p><b>".$row['Protein_name']."</b></p>
				<form autocomplete=off action=../target_result/index.php method=post name=myForm>
    				<input class=myInput type=text name=name value='".$row['Protein_name']."'' readonly>
    				<input type=submit value='See more information'>
    			</form>
			</td>
			<td>".$row['Gene_name']."</td>
			<td>".$row['UniProt_code']."</td>
			</tr>
			";
		}

		?>
		
	</tbody>
</table>
</div>

<?php
include ("../footer.php");
?>