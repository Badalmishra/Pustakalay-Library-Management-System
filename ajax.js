



function showHint(str) {

  var reply;
  document.getElementById("browsers").innerHTML="";
    if (str.length == 0) {
        document.getElementById("browsers").innerHTML = "";
        return;
    }
  else {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
if(this.responseText!="none"){
for (var i = 0; i < JSON.parse(this.responseText).length; i++) {
  document.getElementById("browsers").innerHTML+="<option value='"+JSON.parse(this.responseText)[i]["bname"]+"'>";
reply=JSON.parse(this.responseText);
}}
else{
  document.getElementById("browsers").innerHTML="no sugetion";
}


      };
        xmlhttp.open("GET", "brains/search.php?q=" + str, false);
        xmlhttp.send();

    }
}
document.getElementsByClassName('bbox').onClick =function() {alert('hello');

};
