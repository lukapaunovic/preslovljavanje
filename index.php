<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/style.css">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="assets/flag-serbia-XL.jpg" />
<meta name="author" content="paunovic.win">

<title>Konvertor ćirilica-latinica</title>
<script>
$(document).on('click', '.submit', function() {

var text = $('#tekst').val();
var vrsta = $('#vrsta').val();

if (vrsta == "lat") {
	var type = "lat";
} else if(vrsta == "cyr") {
	var type = "cyr";
}

var ajax_url = "api.php?type=" + type + "&text=" + text;

if (!!text) {
    $.get(ajax_url, function(data) {

$("#rezultat").html(data.text);
    });
    }
	});
	
$(document).on('click', '.about', function() {
	alert("Pokušaj pravljenja još jednog od hiljadu konvertora na internetu");
	});
</script>
</head>
<body>
<nav>
  <ul>
    <li class="active"><a href="#">Početna</a></li>
    <li><a href="#" class="about">O </a></li>
    <li><a href="konvertor.zip">Download</a></li>
    <li><a href="mailto:internetfazoni@gmail.com">Kontakt</a></li>
  </ul>
</nav>

<div class="centar">
<h1>Konvertor ćirlica-latinica</h1>	
<label>Tekst</label>
	<br />
<textarea rows="4" cols="50" id="tekst" placeholder="Unesi tekst"></textarea>	<br />
<select class="vrsta" id="vrsta">
  <option value="lat">Konvertuj u latinicu</option>
  <option value="cyr">Konvertuj u ćirilicu</option>
</select>
<button id="submit" class="submit">Konvertuj</button>
</div>
<div class="rezultat" id="rezultat">Ovde će se prikazati rezultat</div>

</body>
<footer class="footer">
&copy; <?PHP echo date("Y"); ?> - Konvertor
</footer>
</html>