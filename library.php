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

if(isset($_POST['home'])){

  header('Location: index.php');
  
  }
  
if(isset($_POST['random'])){

header('Location: random.php');

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
  echo "<title>Ultimas Atualiza&#xe7;&#xf5;es - " . $SiteName . "</title>\n<meta name='description' content='Lista Completa de Jogos!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jogos de PC, Biblioteca de Jogos, Jogos Completos Gratis, Downloads, Links Diretos, MediaFire, Steam$keywords'>\n<meta property='og:title' content='Ultimas Atualiza&#xe7;&#xf5;es - " . $SiteName . "' />\n<meta property='og:description' content='Lista Completa de Jogos!'>";
}
else if($Language == 'es')
{
  echo "<title>&#xda;ltimas Actualizaciones - " . $SiteName . "</title>\n<meta name='description' content='Lista completa de juegos!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Juegos de PC, Biblioteca de Juegos, Juegos Completos Gratis, Downloads, Links Directos, MediaFire, Steam$keywords'>\n<meta property='og:title' content='&#xda;ltimas Actualizaciones - " . $SiteName . "' />\n<meta property='og:description' content='Lista completa de juegos!'>";
}
else if($Language == 'fr')
{
  echo "<title>Derni&#xe8;res Mises &#xe0; Jour - " . $SiteName . "</title>\n<meta name='description' content='Liste compl&#xe8;te des jeux!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jeux PC, Ludoth&eacute;que, Jeux complets gratuits, T&eacute;l&eacute;chargements, Liens Diretos, MediaFire, Steam$keywords'>\n<meta property='og:title' content='Derni&#xe8;res Mises &#xe0; Jour - " . $SiteName . "' />\n<meta property='og:description' content='Liste compl&#xe8;te des jeux!'>";
}
else if($Language == 'de')
{
  echo "<title>Letzte Aktualisierungen - " . $SiteName . "</title>\n<meta name='description' content='Vollst&#xe4;ndige Liste der Spiele!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Computerspiele, Spielebibliothek, Volle Spiele, Downloads, Direkt Links, MediaFire, Steam$keywords'>\n<meta property='og:title' content='Letzte Aktualisierungen - " . $SiteName . "' />\n<meta property='og:description' content='Vollst&#xe4;ndige Liste der Spiele!'>";
}
else if($Language == 'it')
{
  echo "<title>Ultimi Aggiornamenti - " . $SiteName . "</title>\n<meta name='description' content='Elenco completo dei giochi!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Giochi Per Computer, Libreria Di Giochi, Giochi Completi Gratuiti, Downloads, Link Diretti, MediaFire, Steam$keywords'>\n<meta property='og:title' content='Ultimi Aggiornamenti - " . $SiteName . "' />\n<meta property='og:description' content='Elenco completo dei giochi!'>";
}
else if($Language == 'sv')
{
  echo "<title>Senaste Uppdateringar - " . $SiteName . "</title>\n<meta name='description' content='Komplett lista &#xf6;ver spel!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, PC Windows, PC Spel, Spelbibliotek, Gratis Hela Spel, Nedladdningar, Direktl&auml;nkar, MediaFire, Steam$keywords'>\n<meta property='og:title' content='Senaste Uppdateringar - " . $SiteName . "' />\n<meta property='og:description' content='Komplett lista &#xf6;ver spel!'>";
}
else
{
  echo "<title>Last Updates - " . $SiteName . "</title>\n<meta name='description' content='Full Games List!'>\n<meta name='keywords' content='" . $SiteName . ", Deco Repacks, PC Windows, PC Games, Games Library, Full Games Free, Downloads, Direct Links, MediaFire, Steam$keywords'>\n<meta property='og:title' content='Last Updates - " . $SiteName . "' />\n<meta property='og:description' content='Full Games List!'>";
}

?>

<meta property='og:image' content='assets/img/thumb.png' />
<meta property='og:type' content='website' />

<meta name='author' content='Deco Repacks'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='icon' type='image/png' href='assets/img/favicon.png'>

<link rel='stylesheet' href='assets/css/style.css'>

<script src='assets/js/search.js'></script> 

<?php $myfile = fopen('assets/config/head.html', 'r'); echo fread($myfile,filesize('assets/config/head.html')); fclose($myfile); ?>

</head>
<body class='context'>

<div class='divList' id='divList'>

<a href="index.php"><img src='assets/img/banner.png' width='100%'></img></a>

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

<center>

<?php 

if($Language == 'pt')
{
  
echo "<h1><font color='#ffffff'>Ultimas Atualiza&#xe7;&#xf5;es</font></h1>";

}
else if($Language == 'es')
{
  echo "<h1><font color='#ffffff'>&#xda;ltimas Actualizaciones</font></h1>";
  
}
else if($Language == 'fr')
{
  echo "<h1><font color='#ffffff'>Derni&#xe8;res Mises &#xe0; Jou</font></h1>";
  
}
else if($Language == 'de')
{
  echo "<h1><font color='#ffffff'>Letzte Aktualisierungen</font></h1>";
  
}
else if($Language == 'it')
{
  echo "<h1><font color='#ffffff'>Ultimi Aggiornamenti</font></h1>";
  
}
else if($Language == 'sv')
{
  echo "<h1><font color='#ffffff'>Senaste Uppdateringar</font></h1>";
  
}
else
{
  echo "<h1><font color='#ffffff'>LAST UPDATES</font></h1>";
  
}

?>

</center>

<ul id='myUL'>
  
<?php 

$count = count(glob('games/*', GLOB_ONLYDIR));
$countMax = $count;

while($count >= 1) {

  include "games/" . $count . "/db.php";

  $strTitle = base64_decode($strTitle);
  $strSize = base64_decode($strSize);

  echo "<li><a target='_blank' class='snapchat' style='margin: 5px 5px 0 -2px;' href='game.php?id=$count' data-title='$strSize'>$strTitle <img src='games/$count/icon.png' /></a></li>\n";
  
  $count--;
  
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

<br>

&copy; <?php echo $SiteName ?> - <b><script>document.write(new Date().getFullYear());</script></b></p>

<form action='' method='post'>

<?php 

if($Language == 'pt')
{
  echo "<button id='myBtnHome' title='Pagina Inicial' width='20' height='20' type='submit' name='home' >";
}
else if($Language == 'es')
{
  echo "<button id='myBtnHome' title='Pagina de Inicio' width='20' height='20' type='submit' name='home' >";
}
else if($Language == 'fr')
{
  echo "<button id='myBtnHome' title='Page D&rsquo;accuiel' width='20' height='20' type='submit' name='home' >";
}
else if($Language == 'de')
{
  echo "<button id='myBtnHome' title='Startseite' width='20' height='20' type='submit' name='home' >";
}
else if($Language == 'it')
{
  echo "<button id='myBtnHome' title='Pagina Iniziale' width='20' height='20' type='submit' name='home' >";
}
else if($Language == 'sv')
{
  echo "<button id='myBtnHome' title='Startsida' width='20' height='20' type='submit' name='home' >";
}
else
{
  echo "<button id='myBtnHome' title='Home Page' width='20' height='20' type='submit' name='home' >";
}

?>

<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-home' viewBox='0 0 20 20'>
<path d='M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z'/>
</svg>
</button>
</form>

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

<?php $myfile = fopen('assets/config/body.html', 'r'); echo fread($myfile,filesize('assets/config/body.html')); fclose($myfile); ?>

</div>

</body>
</html>
