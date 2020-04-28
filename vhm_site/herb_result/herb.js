var herbData0 = document.getElementById("herb_result").textContent;
var herbData0 = JSON.parse(herbData0);
var herbData1 = document.getElementById("compound_result").textContent;
var herbData1 = JSON.parse(herbData1);
var text = "";
var t = herbData0["Scientific_name"];
document.title = t;
document.getElementById('sci').innerHTML = herbData0["Scientific_name"];
document.getElementById('fam').innerHTML = herbData0["Familia"];
document.getElementById('vie').innerHTML = herbData0["Vietnamese_name"];
document.getElementById('oth').innerHTML = herbData0["Other_vietnamese_names"];
document.getElementById("img0").src = herbData0["Image_link0"];
document.getElementById("img1").src = herbData0["Image_link1"];
document.getElementById("img2").src = herbData0["Image_link2"];
document.getElementById("img3").src = herbData0["Image_link3"];
document.getElementById('than').innerHTML = herbData0["Stem"];
document.getElementById('la').innerHTML = herbData0["Leaf"];
document.getElementById('re').innerHTML = herbData0["Root"];
document.getElementById('hoa').innerHTML = herbData0["Flower"];
document.getElementById('qua').innerHTML = herbData0["Fruit"];

if (herbData1 !== null) {
for (var i = 0; i < herbData1.length; i++) {
        text +=   "<tr>" +
        "<td>" + herbData1[i]["ID"] + "</td>" +
        "<td>" +
        "<p><b>" + herbData1[i]["Pub_name"] + "</b></p>" +
        "<form autocomplete='off' action=../compound_result/index.php method='post' name='myForm'>" +
            "<input class='myInput' type='text' name='name' value='" + herbData1[i]["Pub_name"] + "' readonly>" +
            "<input type=submit value='Detail'><br><br>" +
        "</form></td>" +
        "<td>" + herbData1[i]["Name"] + "</td>" +
        "<td><img src=" + herbData1[i]["Structure"] + " style='width: 200px; height: 200px; display: inline-block;'></td>" +
                  "</tr>"
      }
      document.getElementById('com').innerHTML = text;
}








