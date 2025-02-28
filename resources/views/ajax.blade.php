<html>
<head>
<script>
function showHint() {
    let collegename = document.getElementById("name").value;
    let sname = document.getElementById("sname").value;
  if (collegename.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint?cname=" + collegename + "&sname="+sname , true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>

  <label for="fname">College name:</label>
  <input type="text" id="name" name="name" ><br>
  <label for="fname">Student name:</label>
  <input type="text" id="sname" name="sname" ><br>
  <button onclick="showHint()">submit
  </button>
  

<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>