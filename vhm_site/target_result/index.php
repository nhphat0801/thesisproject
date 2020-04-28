<?php
include ("../header.php");
include "process_target_result.php";
?>

<div class="container" style="padding-top: 100px">
  <div class="row">
    <div class="col-sm-3" style="background-color:lavender;">
bookmark
    </div>
    <div class="col-sm-9" style="background-color:seaGreen;">
	
	<p><strong style="color: white; font-size: 16px;">Identifers</strong></p>
	<div class="thumbnail">
	<p><strong>Protein Name: </strong><?php echo $row['Protein_name'];?></p>
    <p><strong>Gene Name: </strong><?php echo $row['Gene_name'];?></p>
    <p><strong>UniProt Code: </strong><?php echo $row['UniProt_code'];?></p>
	</div>
	
	<p><strong style="color: white; font-size: 16px;">Reference</strong></p>
	<div class="thumbnail">
	<a href=<?php echo $row['UniProt_link'];?>>To UniProt</a>
	</div>
	
  <p><strong style="color: white; font-size: 16px;">Related Herbs</strong></p>
  <div class="thumbnail">
      <table class="display">
        <thead>
      <th style="text-align: center;color: #777; font-weight: bold; width: 5%;">ID</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 40%;">Scientific Name</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 30%;">Familia</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 30%;">Image</th>
        </thead>
        <tbody>
		<?php
    if (empty($row_herb)) {
    echo "<strong>There is no related herb in database</strong>";
    } 
    else {
      for ($i=0; $i < count($row_herb); $i++) { 
    echo "<tr>
      <td>".$row_herb[$i]['ID']."</td>
      <td>
        <p><b>".$row_herb[$i]['Scientific_name']."</b></p>
        <form autocomplete=off action=../herb_result/index.php method=post name=myForm>
            <input class=myInput type=text name=name value='".$row_herb[$i]['Scientific_name']."'' readonly>
            <input type=submit value='See more information'>
          </form>
      </td>
      <td>".$row_herb[$i]['Familia']."</td>
      <td><img src=".$row_herb[$i]['Image_link0']." style='width: 170px; height: 200px; display: inline-block;'></td>
      </tr>";
    }
    }
		?>
        </tbody>
      </table>
  </div>


  <p><strong style="color: white; font-size: 16px;">Related Compounds</strong></p>
  <div class="thumbnail">
      <table class="display">
        <thead>
      <th style="text-align: center;color: #777; font-weight: bold; width: 5%;">ID</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 40%;">Name</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 25%;">Formula</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 30%;">Structure</th>
        </thead>
        <tbody>
    <?php
    if (empty($row_compound)) {
    echo "<strong>There is no related compound in database</strong>";
    } 
    else {
      for ($i=0; $i < count($row_compound); $i++) { 
    echo "<tr>
      <td>".$row_compound[$i]['ID']."</td>
      <td>
        <p><b>".$row_compound[$i]['Pub_name']."</b></p>
        <form autocomplete=off action=../compound_result/index.php method=post name=myForm>
            <input class=myInput type=text name=name value='".$row_compound[$i]['Pub_name']."'' readonly>
            <input type=submit value='See more information'>
          </form>
      </td>
      <td>".$row_compound[$i]['Formula']."</td>
      <td><img src=".$row_compound[$i]['Structure']." style='width: 200px; height: 200px; display: inline-block;'></td>
      </tr>";
    }
    }
    ?>
        </tbody>
      </table>
  </div>
    
    <div class="thumbnail">
    	<?php
      echo is_null($row_herb);
    	?>
    </div>

    </div>
  </div>
</div>

<?php
include ("../footer.php");
?>