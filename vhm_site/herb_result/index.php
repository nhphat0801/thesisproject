<?php
include ("../header.php");
include "process_herb_result.php";
?>

<div class="container" style="padding-top: 100px">
  <div class="row">
    <div class="col-sm-3" style="background-color:lavender;">
bookmark
    </div>
    <div class="col-sm-9" style="background-color:seaGreen;">
<p id="nf" style="font-size: 30px;color: white;"></p>
<p><strong style="color: white; font-size: 16px;">Name</strong></p>
			<div class="thumbnail" >
    	 		<p><strong>Scientific Name: </strong><span id="sci"></span></p>
			   	<p><strong>Familia: </strong><span id="fam"></span></p>
			   	<p><strong>Vietnamese Name: </strong><span id="vie"></span></p>
			   	<p><strong>Other Vietnamese Names: </strong><span id="oth"></span></p>
			</div>

<p><strong  style="color: white; font-size: 16px;">Image</strong></p>
			<div class="thumbnail">
			<div>
   				<img id="img0" src="" style="width: 24.5%; height: 300px; display: inline-block;">
   				<img id="img1" src="" style="width: 24.5%; height: 300px; display: inline-block;">
   				<img id="img2" src="" style="width: 24.5%; height: 300px; display: inline-block;">
   				<img id="img3" src="" style="width: 24.5%; height: 300px; display: inline-block;">
   		</div>
   		</div>
   		
<p><strong style="color: white; font-size: 16px;">Morphology</strong></p>
      <div class="thumbnail" style="padding-left: 7px;">
  				<p>Thân: <span id="than"></span></p>
  				<p>Lá: <span id="la"></span></p>
  				<p>Rễ: <span id="re"></span></p>
  				<p>Hoa: <span id="hoa"></span></p>
  				<p>Quả: <span id="qua"></span></p>
  		</div>

<p><strong style="color: white; font-size: 16px;">Related Compounds</strong></p>     
      <div class="thumbnail">
        <table id="tab" class="display compact cell-border">
          <thead>
    <th style="text-align: center;color: #777; font-weight: bold; width: 5%;">ID</th>
    <th style="text-align: center;color: #777; font-weight: bold; width: 20%;">Name</th>
    <th style="text-align: center;color: #777; font-weight: bold; width: 50%;">IUPAC Name</th>
    <th style="text-align: center;color: #777; font-weight: bold; width: 25%;">Structure</th>
          </thead>
          <tbody id="com"></tbody>
        </table>
      </div>

<p><strong style="color: white; font-size: 16px;">Related Targets</strong></p>     
      <div class="thumbnail">
        <table id="tab" class="display compact cell-border">
          <thead>
    <th style="text-align: center;color: #777; font-weight: bold; width: 5%;">ID</th>
    <th style="text-align: center;color: #777; font-weight: bold; width: 65%;">Protein Name</th>
    <th style="text-align: center;color: #777; font-weight: bold; width: 15%;">Gene Name</th>
    <th style="text-align: center;color: #777; font-weight: bold; width: 15%;">UniProt Code</th>
          </thead>
          <tbody>
            <?php
    if (empty($row_target)) {
    echo "<strong>There is no related target in database</strong>";
    } 
    else {
      for ($i=0; $i < count($row_target); $i++) { 
    echo "<tr>
      <td>".$row_target[$i]['ID']."</td>
      <td>
        <p><b>".$row_target[$i]['Protein_name']."</b></p>
        <form autocomplete=off action=../target_result/index.php method=post name=myForm>
            <input class=myInput type=text name=name value='".$row_target[$i]['Protein_name']."'' readonly>
            <input type=submit value='Detail'>
          </form>
      </td>
      <td>".$row_target[$i]['Gene_name']."</td>
      <td><a href=".$row_target[$i]['UniProt_link'].">".$row_target[$i]['UniProt_code']."</a></td>
      </tr>";
    }
    }
    ?>
          </tbody>
        </table>
      </div>




<p><strong style="color: white; font-size: 16px;">Distribution</strong></p>
      <div id="chartdiv" class="thumbnail" style="background-color: white;">
        
      </div>
      <div id="demo"></div>
    </div>
  </div>
  		</div>

<div id="herb_result" style="display: none;">
    <?php
        echo json_encode($row);
    ?>                                
</div>

<div id="compound_result" style="display: none;">
    <?php
        echo htmlspecialchars(json_encode($row_compound));
    ?>                                
</div>

<script type="text/javascript" src="herb.js"></script>

<?php
include ("../footer.php");
?>