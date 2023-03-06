<?php

header('Content-Type: text/html; charset=ISO-8859-1');

$myfile = fopen("assets/config/name.html", "r") or die("Unable to open file!");
$SiteName = fread($myfile,filesize("assets/config/name.html"));
fclose($myfile);

$Language = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

if($Language == 'pt' || $Language == 'pt-br')
{
  $Language = "pt";
}
else if($Language == 'es' || $Language == 'es-ar' || $Language == 'es-bo' || $Language == 'es-cl' || $Language == 'es-co' || $Language == 'es-cr' || $Language == 'es-do' || $Language == 'es-ec' || $Language == 'es-sv' || $Language == 'es-gt' || $Language == 'es-hn' || $Language == 'es-mx' || $Language == 'es-ni' || $Language == 'es-pa' || $Language == 'es-py' || $Language == 'es-pe' || $Language == 'es-es' || $Language == 'es-uy' || $Language == 'es-ve')
{
  $Language = "es";
}
else if($Language == 'fr' || $Language == 'fr-be' || $Language == 'fr-ca' || $Language == 'fr-fr' || $Language == 'fr-lu' || $Language == 'fr-mc' || $Language == 'fr-ch')
{
  $Language = "fr";
}
else if($Language == 'de' || $Language == 'de-at' || $Language == 'de-de' || $Language == 'de-li' || $Language == 'de-lu' || $Language == 'de-ch')
{
  $Language = "de";
}
else if($Language == 'it' || $Language == 'it-ch')
{
  $Language = "it";
}
else if($Language == 'sv' || $Language == 'sv-fi' || $Language == 'sv-sv')
{
  $Language = "sv";
}
else
{
  $Language = "en";
}

if(isset($_POST['random'])){

  header('Location: random.php');
  
  }

  if(isset($_POST['library'])){

    header('Location: library.php');
    
    }
      
?>

<!DOCTYPE html>

<html lang='<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?>'>
<head>
<meta http-equiv='content-language' content='<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?>'>
<meta charset='UTF-8'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta name='viewport' content='initial-scale=1, maximum-scale=1'>

<?php 

$keywords = "";
$count = count(glob('games/*', GLOB_ONLYDIR));
$countMax = $count;

while($count >= 1) {

  include "games/" . $count . "/db.php";

  $keywords = $keywords . ", " . base64_decode($strTitle);
  
  $count--;
  
}

$keywords = str_replace("'","",$keywords);


if($Language == 'pt')
{
  echo "<title>" . $SiteName . " - Baixar Jogos Completos</title>\n<meta name='description' content='Baixar jogos completos gratis!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jogos de PC, Biblioteca de Jogos, Jogos Completos Gratis, Downloads, Links Diretos, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - Baixar Jogos' />\n<meta property='og:description' content='Baixar jogos completos gratis!'>";
}
else if($Language == 'es')
{
  echo "<title>" . $SiteName . " - Descargar Juegos Completos</title>\n<meta name='description' content='Descargar juegos completos gratis!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Juegos de PC, Biblioteca de Juegos, Juegos Completos Gratis, Downloads, Links Directos, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - Descargar Juegos' />\n<meta property='og:description' content='Descargar juegos completos gratis!'>";
}
else if($Language == 'fr')
{
  echo "<title>" . $SiteName . " - T&eacute;l&eacute;charger des jeux complets</title>\n<meta name='description' content='T&eacute;l&eacute;charger des jeux complets gratuitement!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jeux PC, Ludoth&eacute;que, Jeux complets gratuits, T&eacute;l&eacute;chargements, Liens Diretos, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - T&eacute;l&eacute;charger des jeux' />\n<meta property='og:description' content='T&eacute;l&eacute;charger des jeux complets gratuitement!'>";
}
else if($Language == 'de')
{
  echo "<title>" . $SiteName . " - Vollst&auml;ndige Spiele Henrunterladen</title>\n<meta name='description' content='Vollst&auml;ndige Spiele Kostenlos Henrunterladen!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Computerspiele, Spielebibliothek, Volle Spiele, Downloads, Direkt Links, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - Vollst&auml;ndige Spiele Henrunterladen' />\n<meta property='og:description' content='Vollst&auml;ndige Spiele Kostenlos Henrunterladen!'>";
}
else if($Language == 'it')
{
  echo "<title>" . $SiteName . " - Scarica Giochi Completi</title>\n<meta name='description' content='Scarica Giochi Completi Gratis!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Giochi Per Computer, Libreria Di Giochi, Giochi Completi Gratuiti, Downloads, Link Diretti, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - Scarica Giochi Completi' />\n<meta property='og:description' content='Scarica Giochi Completi Gratis'>";
}
else if($Language == 'sv')
{
  echo "<title>" . $SiteName . " - Ladda Ner Hela Spelet</title>\n<meta name='description' content='Ladda Ner Hela Spel Gratis!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, PC Windows, PC Spel, Spelbibliotek, Gratis Hela Spel, Nedladdningar, Direktl&auml;nkar, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - Ladda Ner Hela Spelet' />\n<meta property='og:description' content='Ladda Ner Hela Spel Gratis'>";
}
else
{
  echo "<title>" . $SiteName . " - Full Games Download</title>\n<meta name='description' content='Full Games Download Free!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, PC Windows, PC Games, Games Library, Full Games Free, Downloads, Direct Links, MediaFire, Steam$keywords'>\n<meta property='og:title' content='" . $SiteName . " - Full Games Download' />\n<meta property='og:description' content='Full Games Download Free'>";
}

?>

<meta property='og:image' content='assets/img/thumb.png' />
<meta property='og:type' content='website' />

<meta name='author' content='Deco Repacks'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='icon' type='image/png' href='assets/img/favicon.png'>

<link rel='stylesheet' href='assets/css/style.css'>

<script src='assets/js/randomize.js'></script> 
<script src='assets/js/search.js'></script> 

<?php $myfile = fopen('assets/config/head.html', 'r'); echo fread($myfile,filesize('assets/config/head.html')); fclose($myfile); ?>

</head>
<body class='context'>

<div class="divLoading" id="divLoading">

<img src="assets/img/loading.gif">

</div>

<div class='divList' id='divList' hidden>

<img src='assets/img/banner.png' width='100%'></img>

<div class='block'>

<?php 

if($Language == 'pt')
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='Buscar...' width='100%'>";
}
else if($Language == 'es')
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='Buscar...' width='100%'>";
}
else if($Language == 'fr')
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='Rechercher...' width='100%'>";
}
else if($Language == 'de')
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='Suchen...' width='100%'>";
}
else if($Language == 'it')
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='Cerca...' width='100%'>";
}
else if($Language == 'sv')
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='S&ouml;k...' width='100%'>";
}
else
{
  echo "<input type='text' id='myInput' onkeyup='searchName()' placeholder='Search...' width='100%'>";
}

?>

</div>

<br><br>

<ul id='myUL'>
  
<?php 

$countMax = count(glob('games/*', GLOB_ONLYDIR));

$count = 1;

while($count <= $countMax) {

  include "games/" . $count . "/db.php";

  $strTitle = base64_decode($strTitle);
  $strSize = base64_decode($strSize);

  echo "<li><a target='_blank' class='snapchat' style='margin: 5px 5px 0 -2px;' href='game.php?id=$count' data-title='$strSize'>$strTitle <img src='games/$count/icon.png' /></a></li>\n";
  
  $count++;
}

?>

</ul>

<br>

<?php $myfile = fopen('assets/config/comments.html', 'r'); echo fread($myfile,filesize('assets/config/comments.html')); fclose($myfile); ?>

<br>

<p align='center'>

<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-windows' viewBox='0 0 16 16'>
<path d='M6.555 1.375 0 2.237v5.45h6.555V1.375zM0 13.795l6.555.933V8.313H0v5.482zm7.278-5.4.026 6.378L16 16V8.395H7.278zM16 0 7.33 1.244v6.414H16V0z'/>
</svg>

<br>&copy; <?php echo $SiteName ?> - <b><script>document.write(new Date().getFullYear());</script></b></p>

<form action='' method='post'>

<?php 

if($Language == 'pt')
{
  echo "<button id='myBtnRandom' title='Jogo Aleatorio' width='20' height='20' type='submit' name='random' >";
}
else if($Language == 'es')
{
  echo "<button id='myBtnRandom' title='Juego Aleatorio' width='20' height='20' type='submit' name='random' >";
}
else if($Language == 'fr')
{
  echo "<button id='myBtnRandom' title='Jeu Al&eacute;atoire' width='20' height='20' type='submit' name='random' >";
}
else if($Language == 'de')
{
  echo "<button id='myBtnRandom' title='Zufallsspiel' width='20' height='20' type='submit' name='random' >";
}
else if($Language == 'it')
{
  echo "<button id='myBtnRandom' title='Gioco Casuale' width='20' height='20' type='submit' name='random' >";
}
else if($Language == 'sv')
{
  echo "<button id='myBtnRandom' title='Slumpm&auml;ssigt Spel' width='20' height='20' type='submit' name='random' >";
}
else
{
  echo "<button id='myBtnRandom' title='Random Game' width='20' height='20' type='submit' name='random' >";
}

?>

<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-filetype-html' viewBox='0 0 20 20'>
    <path fill-rule='evenodd' d='M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z'/>
  <path d='M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z'/>
</svg>
</button>

</form>





<form action='' method='post'>

<?php 

if($Language == 'pt')
{
  echo "<button id='myBtnLibrary' title='Ultimas Atualiza&#xe7;&#xf5;es' width='20' height='20' type='submit' name='library' >";
}
else if($Language == 'es')
{
  echo "<button id='myBtnLibrary' title='&#xda;ltimas Actualizaciones' width='20' height='20' type='submit' name='library' >";
}
else if($Language == 'fr')
{
  echo "<button id='myBtnLibrary' title='Derni&#xe8;res Mises &#xe0; Jour' width='20' height='20' type='submit' name='library' >";
}
else if($Language == 'de')
{
  echo "<button id='myBtnLibrary' title='Letzte Aktualisierungen' width='20' height='20' type='submit' name='library' >";
}
else if($Language == 'it')
{
  echo "<button id='myBtnLibrary' title='Ultimi Aggiornamenti' width='20' height='20' type='submit' name='library' >";
}
else if($Language == 'sv')
{
  echo "<button id='myBtnLibrary' title='Senaste Uppdateringar' width='20' height='20' type='submit' name='library' >";
}
else
{
  echo "<button id='myBtnLibrary' title='Last Updates' width='20' height='20' type='submit' name='library' >";
}

?>

<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-cloud-arrow-up' viewBox='0 0 20 20'>
<path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
<path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
</svg>
</button>

</form>

<?php $myfile = fopen('assets/config/body.html', 'r'); echo fread($myfile,filesize('assets/config/body.html')); fclose($myfile); ?>

</div>

</body>
</html>
