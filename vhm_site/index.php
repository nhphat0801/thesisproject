<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 700px;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
</head>
<body onload="choiceFunc()">

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #006400;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/vhm_site/">
        <img src="https://upload.wikimedia.org/wikipedia/vi/c/cd/Logo-hcmut.svg" width="80" height="80">
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/vhm_site/" style="color: White;">Home</a></li>
      <li><a href="/vhm_site/herb/" style="color: White;">Herb</a></li>
      <li><a href="/vhm_site/compound/" style="color: White;">Compound</a></li>
      <li><a href="/vhm_site/disease/" style="color: White;">Disease</a></li>
      <li><a href="/vhm_site/target/" style="color: White;">Target</a></li>
    </ul>
  </div>
</nav>

<!--Make sure the form has the autocomplete function switched off:-->
<div class="container" style="margin-top: 100px;">
<div class="thumbnail">
<h2>Search for Vietnamese herbal information</h2>
<form autocomplete="off" action="herb_result/index.php" method="post" name="myForm">
<div class="form-group">
<select id="mySelect" onchange="choiceFunc()">
			<option value="vie">Vietnamese Name</option>
    	<option value="sci">Scientific Name</option>
</select>
</div>
<div class="form-group">
  <div class="autocomplete">
    <input id="myInput" type="text" name="name">
  </div>
  <button id="myBtn" type="submit" class="btn btn-success" style="width: 100px;"><i class="glyphicon glyphicon-search"></i></button>
</div>
</form>
</div>
</div>
<script>
	// Set enter key for submitting
	function submitForm(){
    document.myForm.submit();
    document.myForm.method='post';
    document.myForm.action='result.php';
}
document.onkeydown=function(){
    if(window.event.keyCode=='13'){
        submitForm();
    }
}
</script>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}


/*An array containing all the country names in the world:*/
var vnHerbs = ["Rau đắng đất", "Nga truật", "Nhân trần", "Cà dại hoa trắng", "Bách bệnh", "Nghệ trắng", "Diệp hạ châu đắng", "Gừng gió", "Lá diễn", "Thần xạ hương", "Xăng mã", "An xoa", "Màn màn hoa trắng", "Ráy gai", "Lục lạc ba lá tròn", "Cò sen", "Mua nhiều hoa", "Bung lai", "Bìm bìm chân cọp", "Lốt rừng", "Núc Nác", "Cây mật gấu", "Màn màn hoa tím"];

var engHerbs = ["Glinus oppositifolius", "Curcuma zedoaria", "Adenosma caeruleum", "Solanum torvum", "Eurycoma longifolia", "Curcuma aromatica", "Phyllanthus amarus", "Zingiber zerumbet", "Dicliptera chinensis", "Luvunga scandens", "Carallia brachiata", "Helicteres hirsuta", "Cleome gynandra", "Lasia spinosa", "Crotalaria mucronata", "Miliusa velutina", "Melastoma affine", "Microcos paniculata", "Ipomoea pestigridis", "Piper sarmentosum", "Oroxylum indicum", "Vernonia Amygdalina", "Cleome rutidosperma"];
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
function choiceFunc(){
	if (document.getElementById('mySelect').value=='vie') {
	autocomplete(document.getElementById("myInput"), vnHerbs);
  document.getElementById('myInput').placeholder = "Enter Vietnamese Name of herb"
}
else {
  document.getElementById('myInput').placeholder = "Enter Scientific Name of herb"
	autocomplete(document.getElementById("myInput"), engHerbs);
}
}
</script>
</body>
</html>