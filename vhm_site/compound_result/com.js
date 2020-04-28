var comData0 = document.getElementById("compound_result").textContent;
var comData1 = document.getElementById("herb_result").textContent;
var comData0 = JSON.parse(comData0);
var comData1 = JSON.parse(comData1);
var text = "";
var t = comData0["Pub_name"];
var ref = comData0["Ref"];
var cid = ref.slice(42);
var pro = comData0["Property"];

document.title = t;
$('#headName').text(comData0["Pub_name"]);
$('#cid').text(cid);
//document.getElementById('mol').innerHTML = comData0["Formula"];
$('#mol').html(comData0["Formula"]);
$('#iupac').text(comData0["Name"]);

if (pro !== null) {
    var proArr = pro.split(",");
    $('#mw').text(proArr[0]);
    $('#hbd').text(proArr[1]);
    $('#hba').text(proArr[2]);
    $('#rbc').text(proArr[3]);
    $('#fc').text(proArr[4]);
}

document.getElementById("str").src = comData0["Structure"];
document.getElementById("ref").href = comData0["Ref"];

if (comData1 !== null) {
for (var i = 0; i < comData1.length; i++) {
        text += "<tr>" +
        "<td>" + comData1[i]["ID"] + "</td>" +
        "<td>" +
        "<p><b>" + comData1[i]["Scientific_name"] + "</b></p>" +
        "<form autocomplete='off' action=../herb_result/index.php method='post' name='myForm'>" +
            "<input class='myInput' type='text' name='name' value='" + comData1[i]["Scientific_name"] + "' readonly>" +
            "<input type=submit value='See more information'><br><br>" +
        "</form>" +
        "</td>" +
        "<td>" + comData1[i]["Familia"] + "</td>" +
        "<td><img src=" + comData1[i]["Image_link0"] + " style='width: 190px; height: 200px; display: inline-block;'></td>" +
                  "</tr>"
      }
document.getElementById('herb').innerHTML = text;
}





