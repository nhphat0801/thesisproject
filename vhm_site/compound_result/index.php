<?php
include ("../header.php");
include "process_com_result.php";
?>

<div class="container" style="padding-top: 100px">
  <div class="row">
    <div class="col-sm-3" style="background-color:lavender;">
bookmark
    </div>
    <div class="col-sm-9" style="background-color:seaGreen;">
    
    <p><strong id="headName" style="color: white; font-size: 30px;"></strong></p> 
    
    <p><strong style="color: white; font-size: 16px;">Identifers</strong></p>
    <div class="thumbnail">
      <p><strong>PubChem CID: </strong><span id="cid"></span></p>
      <p><strong>Molecular Formula: </strong><span id="mol"></span></p>
      <p><strong>IUPAC Name: </strong><span id="iupac"></span></p>
    </div>
    
    <p><strong style="color: white; font-size: 16px;">Properties</strong></p>
    <div class="thumbnail">
      <table class="table">
        <thead>
          <th>Molecular Weight</th>
          <th>Hydrogen Bond Donor Count</th>
          <th>Hydrogen Bond Acceptor Count</th>
          <th>Rotatable Bond Count</th>
          <th>Formal Charge</th>
        </thead>
        <tbody>
          <tr>
            <td id="mw"></td>
            <td id="hbd"></td>
            <td id="hba"></td>
            <td id="rbc"></td>
            <td id="fc"></td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <p><strong style="color: white; font-size: 16px;">2D Structure</strong></p>
    <img id="str" src="">
    
    <p><strong style="color: white; font-size: 16px;">Reference</strong></p>
    <div class="thumbnail">
      <a id="ref" target="_blank" href="">PubChem</a>
    </div>

    <p><strong style="color: white; font-size: 16px;">Related Herbs</strong></p>
    <div class="thumbnail">
      <table id="tab" class="display compact cell-border">
        <thead>
      <th style="text-align: center;color: #777; font-weight: bold; width: 5%;">ID</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 40%;">Scientific Name</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 30%;">Familia</th>
      <th style="text-align: center;color: #777; font-weight: bold; width: 30%;">Image</th>
        </thead>
        <tbody id="herb">
        </tbody>
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
    
    <div class="thumbnail" id="demo"></div>
    </div>
  </div>
</div>

<div id="compound_result" style="display: none;">
    <?php
        echo htmlspecialchars(json_encode($row));
    ?>                                
</div>

<div id="herb_result" style="display: none;">
    <?php
        echo json_encode($row_herb);
    ?>                                
</div>
<div> <?php echo $row['Formula'];  ?> </div>

<script type="text/javascript" src="com.js"></script>

<?php
include ("../footer.php");
?>

