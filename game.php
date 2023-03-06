<?php


$strId = $_GET['id'];

include 'games/' . $strId .'/db.php';

$strTitle = base64_decode($strTitle);
$strImage = base64_decode($strImage);
$strVideo = base64_decode($strVideo);
$strSize = base64_decode($strSize);
$strYear = base64_decode($strYear);
$strDescriptionEn = base64_decode($strDescriptionEn);
$strDescriptionPt = base64_decode($strDescriptionPt);
$strDescriptionEs = base64_decode($strDescriptionEs);
$strDescriptionFr = base64_decode($strDescriptionFr);
$strDescriptionDe = base64_decode($strDescriptionDe);
$strDescriptionIt = base64_decode($strDescriptionIt);
$strDescriptionSV = base64_decode($strDescriptionSV);

if($strTitle == null)
{
  header('Location: index.php');
}






header('Content-Type: text/html; charset=ISO-8859-1');

$myfile = fopen("assets/config/name.html", "r") or die("Unable to open file!");
$SiteName = fread($myfile,filesize("assets/config/name.html"));
fclose($myfile);
  





if(isset($_POST['home'])){

header('Location: index.php');

}

if(isset($_POST['random'])){

header('Location: random.php');

}

$Language = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

if($Language == 'pt' || $Language == 'pt-br')
{
  $Language = "pt";
  $strDescription = $strDescriptionPt;
}
else if($Language == 'es' || $Language == 'es-ar' || $Language == 'es-bo' || $Language == 'es-cl' || $Language == 'es-co' || $Language == 'es-cr' || $Language == 'es-do' || $Language == 'es-ec' || $Language == 'es-sv' || $Language == 'es-gt' || $Language == 'es-hn' || $Language == 'es-mx' || $Language == 'es-ni' || $Language == 'es-pa' || $Language == 'es-py' || $Language == 'es-pe' || $Language == 'es-es' || $Language == 'es-uy' || $Language == 'es-ve')
{
  $Language = "es";
  $strDescription = $strDescriptionEs;
}
else if($Language == 'fr' || $Language == 'fr-be' || $Language == 'fr-ca' || $Language == 'fr-fr' || $Language == 'fr-lu' || $Language == 'fr-mc' || $Language == 'fr-ch')
{
  $Language = "fr";
  $strDescription = $strDescriptionFr;
}
else if($Language == 'de' || $Language == 'de-at' || $Language == 'de-de' || $Language == 'de-li' || $Language == 'de-lu' || $Language == 'de-ch')
{
  $Language = "de";
  $strDescription = $strDescriptionDe;
}
else if($Language == 'it' || $Language == 'it-ch')
{
  $Language = "it";
  $strDescription = $strDescriptionIt;
}
else if($Language == 'sv' || $Language == 'sv-fi' || $Language == 'sv-sv')
{
  $Language = "sv";
  $strDescription = $strDescriptionSv;
}
else
{
  $Language = "en";
  $strDescription = $strDescriptionEn;
}

$NewCharsDescription = array(

    'Á'=>'&Aacute;', 'á'=>'&aacute;', 'Â'=>'&Acirc;','â'=>'&acirc;', 'À'=>'&Agrave;', 'à'=>'&agrave;', 'Å'=>'&Aring;', 'å'=>'&aring;', 'Ã'=>'&Atilde;', 'ã'=>'&atilde;',

    'Ä'=>'&Auml;', 'ä'=>'&auml;', 'Æ'=>'&AElig;', 'æ'=>'&aelig;', 'É'=>'&Eacute;', 'é'=>'&eacute;', 'Ê'=>'&Ecirc;', 'ê'=>'&ecirc;', 'È'=>'&Egrave;', 'è'=>'&egrave;',

    'Ë'=>'&Euml;', 'ë'=>'&Euml;', 'Ð'=>'&ETH;', 'ð'=>'&eth;', 'Í'=>'&Iacute;', 'í'=>'&iacute;', 'Î'=>'&Icirc;', 'î'=>'&icirc;', 'Ì'=>'&Igrave;', 'ì'=>'&igrave;', 'Ï'=>'&Iuml;',

    'ï'=>'&iuml;', 'Ó'=>'&Oacute;', 'ó'=>'&oacute;', 'Ô'=>'&Ocirc;', 'ô'=>'&ocirc;','Ò'=>'&Ograve;', 'ò'=>'&ograve;', 'Ø'=>'&Oslash;', 'ø'=>'&oslash;', 'Õ'=>'&Otilde;',

    'õ'=>'&otilde;', 'Ö'=>'&Ouml;', 'ö'=>'&ouml;', 'Ú'=>'&Uacute;', 'ú'=>'&uacute;', 'Û'=>'&Ucirc;', 'û'=>'&ucirc;', 'Ù'=>'&Ugrave;', 'ù'=>'&ugrave;', 'Ü'=>'&Uuml;',

    'ü'=>'&uuml;', 'Ç'=>'&Ccedil;', 'ç'=>'&ccedil;', 'Ñ'=>'&Ntilde;', 'ñ'=>'&ntilde;', 'Ý'=>'&Yacute;', 'ý'=>'&yacute;', '“'=>'&quot;', '®'=>'&reg;', '©'=>'&copy;', '‘'=>'&apos;', 
    
    '’'=>'&rsquo;', '‘'=>'&lsquo;',

    '¢'=>'&cent;', '£'=>'&pound;', '¥'=>'&yen;', '€'=>'&euro;', '™'=>'&trade;', '←'=>'&larr;', '↑'=>'&uarr;', '→'=>'&rarr;', '↓'=>'&darr;', '♠'=>'&spades;', '♣'=>'&clubs;',
    
    '♥'=>'&hearts;', '♦'=>'&diams;', '′'=>'&prime;', '″'=>'&Prime', '°'=>'&deg;', 'β'=>'&beta;', 'Β'=>'&Beta;', '–'=>'&ndash;', 

);

$strDescription = strtr($strDescription, $NewCharsDescription);
	


$NewCharsTitle = array(

    'Á'=>'&Aacute;', 'á'=>'&aacute;', 'Â'=>'&Acirc;','â'=>'&acirc;', 'À'=>'&Agrave;', 'à'=>'&agrave;', 'Å'=>'&Aring;', 'å'=>'&aring;', 'Ã'=>'&Atilde;', 'ã'=>'&atilde;',

    'Ä'=>'&Auml;', 'ä'=>'&auml;', 'Æ'=>'&AElig;', 'æ'=>'&aelig;', 'É'=>'&Eacute;', 'é'=>'&eacute;', 'Ê'=>'&Ecirc;', 'ê'=>'&ecirc;', 'È'=>'&Egrave;', 'è'=>'&egrave;',

    'Ë'=>'&Euml;', 'ë'=>'&Euml;', 'Ð'=>'&ETH;', 'ð'=>'&eth;', 'Í'=>'&Iacute;', 'í'=>'&iacute;', 'Î'=>'&Icirc;', 'î'=>'&icirc;', 'Ì'=>'&Igrave;', 'ì'=>'&igrave;', 'Ï'=>'&Iuml;',

    'ï'=>'&iuml;', 'Ó'=>'&Oacute;', 'ó'=>'&oacute;', 'Ô'=>'&Ocirc;', 'ô'=>'&ocirc;','Ò'=>'&Ograve;', 'ò'=>'&ograve;', 'Ø'=>'&Oslash;', 'ø'=>'&oslash;', 'Õ'=>'&Otilde;',

    'õ'=>'&otilde;', 'Ö'=>'&Ouml;', 'ö'=>'&ouml;', 'Ú'=>'&Uacute;', 'ú'=>'&uacute;', 'Û'=>'&Ucirc;', 'û'=>'&ucirc;', 'Ù'=>'&Ugrave;', 'ù'=>'&ugrave;', 'Ü'=>'&Uuml;',

    'ü'=>'&uuml;', 'Ç'=>'&Ccedil;', 'ç'=>'&ccedil;', 'Ñ'=>'&Ntilde;', 'ñ'=>'&ntilde;', 'Ý'=>'&Yacute;', 'ý'=>'&yacute;', '“'=>'&quot;', '®'=>'&reg;', '©'=>'&copy;', '‘'=>'&apos;',

    '’'=>'&rsquo;', '‘'=>'&lsquo;',

    '¢'=>'&cent;', '£'=>'&pound;', '¥'=>'&yen;', '€'=>'&euro;', '™'=>'&trade;', '←'=>'&larr;', '↑'=>'&uarr;', '→'=>'&rarr;', '↓'=>'&darr;', '♠'=>'&spades;', '♣'=>'&clubs;',
    
    '♥'=>'&hearts;', '♦'=>'&diams;', '′'=>'&prime;', '″'=>'&Prime', '°'=>'&deg;', 'β'=>'&beta;', 'Β'=>'&Beta;', '–'=>'&ndash;', 

);

$strTitle = strtr($strTitle, $NewCharsTitle);
	
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}

$strCurrentPath = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang='<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?>'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta name='viewport' content='initial-scale=1, maximum-scale=1'>
<meta http-equiv='content-language' content='<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?>'>


<?php 

if($Language == 'pt')
{
  echo "<title>" . $strTitle . " - Download Completo (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jogos de PC, Biblioteca de Jogos, Jogos Completos Gratis, Downloads, Links Diretos, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - Full Download (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}
else if($Language == 'es')
{
  echo "<title>" . $strTitle . " - Descarga Completa (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Juegos de PC, Biblioteca de Juegos, Juegos Completos Gratis, Downloads, Links Directos, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - Descarga Completa (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}
else if($Language == 'fr')
{
  echo "<title>" . $strTitle . " - T&egrave;l&egrave;chargement Complet (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jeux PC, Ludoth&egrave;que, Jeux complets gratuits, T&egrave;l&egrave;chargements, Liens Diretos, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - T&egrave;l&egrave;chargement Complet (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}
else if($Language == 'de')
{
  echo "<title>" . $strTitle . " - Volle Entladung (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Jogos de PC, Biblioteca de Jogos, Jogos Completos Gratis, Downloads, Links Diretos, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - Full Download (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}
else if($Language == 'it')
{
  echo "<title>" . $strTitle . " - Scarica Giochi (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, Giochi Per Computer, Libreria Di Giochi, Giochi Completi Gratuiti, Downloads, Link Diretti, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - Scarica Giochi (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}
else if($Language == 'sv')
{
  echo "<title>" . $strTitle . " - Fullst&auml;ndig Nedladdning (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, PC Spel, Spelbibliotek, Gratis Hela Spel, Nedladdningar, Direktl&auml;nkar, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - Fullst&auml;ndig Nedladdning (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}
else
{
    echo "<title>" . $strTitle . " - Full Download (PC Windows)</title>\n<meta name='description' content='" . $strDescription . "'>\n<meta name='keywords' content='" . $strTitle . ", Deco Repacks, Torrent, Magnet Link, PC Windows, PC Games, Games Library, Full Games Free, Downloads, Direct Links, MediaFire, Steam'>\n<meta property='og:title' content='" . $strTitle . " - Full Download (PC Windows)' />\n<meta property='og:description' content='" . $strDescription . "' />";
}

?>




<?php 

$downloadLink = $strCurrentPath . '&#x2f;download.php?id='. $strId;

if($Language == 'pt')
{
  echo "<script> function JSalert(){	swal('Obrigado!', 'Por favor considere semear este torrent para ajudar nossa causa!', ''); window.open(" . $downloadLink . ", '_blank').focus(); } </script>";
}
else if($Language == 'es')
{
  echo "<script> function JSalert(){	swal('Gracias!', 'Por favor considere sembrar el torrent para ayudar a nuestra causa!', ''); window.open(" . $downloadLink . ", '_blank').focus(); setcookie('download', '" . $strId . "', time() + (86400 * 30)); } </script>";
}
else if($Language == 'fr')
{
  echo "<script> function JSalert(){	swal('Merci!', 'S\u0027il vous pla\u00eet, pensez \u00e0 semer le torrent pour aider notre cause!', ''); window.open(" . $downloadLink . ", '_blank').focus(); setcookie('download', '" . $strId . "', time() + (86400 * 30)); } </script>";
}
else if($Language == 'de')
{
  echo "<script> function JSalert(){	swal('Danke!', 'Bitte erw\u00e4gen Sie, den Torrent zu s\u00e4en, um unserer Sache zu helfen!', ''); window.open(" . $downloadLink . ", '_blank').focus(); setcookie('download', '" . $strId . "', time() + (86400 * 30)); } </script>";
}
else if($Language == 'it')
{
  echo "<script> function JSalert(){	swal('Grazie!', 'Per favore, considera di seminare il torrent per aiutare la nostra causa!', ''); window.open(" . $downloadLink . ", '_blank').focus(); setcookie('download', '" . $strId . "', time() + (86400 * 30)); } </script>";
}
else if($Language == 'sv')
{
  echo "<script> function JSalert(){	swal('Tack!', 'V\u00e4nligen s\u00e5 torrenten f\u00f6r att hj\u00e4lpa v\u00e5r sak!', ''); window.open(" . $downloadLink . ", '_blank').focus(); setcookie('download', '" . $strId . "', time() + (86400 * 30)); } </script>";
}
else
{
  echo "<script> function JSalert(){	swal('Thank You!', 'Please consider seed this torrent to help our cause!', ''); window.open(" . $downloadLink . ", '_blank').focus();  setcookie('download', '" . $strId . "', time() + (86400 * 30)); } </script>";
}

?>




<meta property='og:image' content='<?php echo $strImage ?>' />
<meta property='og:type' content='website' />
<meta name='author' content='Deco Repacks'>

<link rel='stylesheet' href='assets/css/style.css'>
<link rel='stylesheet' href='assets/css/sweetalert.css'>
<script src='assets/js/sweetalert-dev.js'></script>

<link rel='icon' type='image/png' href='games/<?php echo $strId ?>/icon.png'>


<?php $myfile = fopen('assets/config/head.html', 'r'); echo fread($myfile,filesize('assets/config/head.html')); fclose($myfile); ?>

</head>
<body>

<div class='divList' id='divList'>

<a href="index.php"><img src='assets/img/banner.png' width='100%'></img></a>

<center>

<h1><font color='#ffffff'><?php echo $strTitle ?></font></h1>

<img width='100%' src='<?php echo $strImage ?>'>

<h2>VIDEO</h2>

<video width='100%' controls autoplay muted loop> <source src='<?php echo $strVideo ?>' type='video/webm'>Your browser does not support the video tag.</video>

<br>

<?php 

if($Language == 'pt')
{
    echo "<h2>SOBRE O JOGO</h2>";
}
else if($Language == 'es')
{
    echo "<h2>SOBRE EL JUEGO</h2>";
}
else if($Language == 'fr')
{
    echo "<h2>&Aacute; PROPOS DU JEU</h2>";
}
else if($Language == 'de')
{
    echo "<h2>&Uuml;BER DAS SPIEL</h2>";
}
else if($Language == 'it')
{
    echo "<h2>RIGUARDO AL GIOCO</h2>";
}
else if($Language == 'sv')
{
    echo "<h2>OM SPELET</h2>";
}
else
{
    echo "<h2>ABOUT THE GAME</h2>";
}

?>

</center>

<?php echo $strDescription ?>

<hr>

<?php 

if($Language == 'pt')
{
    echo "Plataforma: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>Ano: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Tamanho: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>Downloads: <font color='#ffffff' style='font-weight: bold;'>";
}
else if($Language == 'es')
{
    echo "Plataforma: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>A&ntilde;o: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Talla: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>Descargas: <font color='#ffffff' style='font-weight: bold;'>";
}
else if($Language == 'fr')
{
    echo "Plateforme: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>Annn&eacute;e: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Taille: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>T&egrave;l&egrave;chargements: <font color='#ffffff' style='font-weight: bold;'>";
}
else if($Language == 'de')
{
    echo "Plattform: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>Jahr: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Gr&ouml;&Beta;&Beta;e: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>Entladungen: <font color='#ffffff' style='font-weight: bold;'>";
}
else if($Language == 'it')
{
    echo "Piattaforma: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>Anno: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Taglia: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>Scarichi: <font color='#ffffff' style='font-weight: bold;'>";
}
else if($Language == 'sv')
{
    echo "Plattform: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>&Aring;r: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Storlek: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>Nedladdningar: <font color='#ffffff' style='font-weight: bold;'>";
}
else
{
    echo "Platform: <font color='#ffffff' style='font-weight: bold;'>PC Windows</font><br></br>Year: <font color='#ffffff' style='font-weight: bold;'>" . $strYear . "</font><br></br>Size: <font color='#ffffff' style='font-weight: bold;'>" . $strSize . "</font><br></br>Downloads: <font color='#ffffff' style='font-weight: bold;'>";
}

?>

<?php 


$file = 'games/' . $strId . '/downloads.txt';

if(!is_file($file)){
              
    file_put_contents($file, '0'); 
}

$myfile = fopen($file, "r") or die("Unable to open file!");
echo fread($myfile,filesize($file));
fclose($myfile);

?>

</font> 

<hr>
<br>

<center>

<img src='assets/img/target.gif'></img>

<br>

<?php 

$downloadLink = $strCurrentPath . '&#x2f;download.php?id='. $strId;

echo '<a id="myLink" href="' . $downloadLink . '" target="_blank"  onclick="JSalert();return false;">';

?>

<div class='btn_wrap'>
    

<?php 

if($Language == 'pt')
{
  echo "<span><b>Download</b></span>";
}
else if($Language == 'es')
{
  echo "<span><b>Descargar</b></span>";
}
else if($Language == 'fr')
{
  echo "<span><b>T&egrave;l&egrave;charger</b></span>";
}
else if($Language == 'de')
{
  echo "<span><b>Herunterladen</b></span>";
}
else if($Language == 'it')
{
  echo "<span><b>Scaricare</b></span>";
}
else if($Language == 'sv')
{
  echo "<span><b>Ladda Ner</b></span>";
}
else
{
  echo "<span><b>Download</b></span>";
}

?>


<div class='container'>
<!---->
</div>
	
</div>
</a>

<br>

<div>

<button id='myBtnShare' title='QR Code' width='20' height='20'  onclick='qrCode(this)' >
<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-qrcode' viewBox='0 0 20 20'>
<path d='M2 2h2v2H2V2Z'/>
<path d='M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z'/>
<path d='M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z'/>
<path d='M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z'/>
<path d='M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z'/>
</svg>
</button>

<a href='https://api.whatsapp.com/send?1=ptBR&text=<?php echo $strCurrentPath . '/game.php?id=' . $strId ?>' target='_blank'>
<button id='myBtnShare' title='WhatsApp' width='20' height='20'>
<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-whatsapp' viewBox='0 0 20 20'>
<path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
</svg>
</button>
</a>

<a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo $strCurrentPath . '/game.php?id=' . $strId ?>' target='_blank'>
<button id='myBtnShare' title='Facebook' width='20' height='20'>
<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-facebook' viewBox='0 0 20 20'>
<path d='M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z'/>
</svg>
</button>
</a>

</div>

<br>

<img id='picQrCode' src='../../assets/img/transparent.png' alt='' />

<script type='text/javascript'>

    function qrCode(x){ 
    var pic = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $strCurrentPath . '/game.php?id=' . $strId ?>%2F&choe=UTF-8'
    document.getElementById('picQrCode').src = pic.replace('90x90', '300x300');
	
	x.style.display = 'none';

    }

</script>

<br>

<?php $myfile = fopen('assets/config/comments.html', 'r'); echo fread($myfile,filesize('assets/config/comments.html')); fclose($myfile); ?>

<br>

<p align='center'>

<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-windows' viewBox='0 0 16 16'>
<path d='M6.555 1.375 0 2.237v5.45h6.555V1.375zM0 13.795l6.555.933V8.313H0v5.482zm7.278-5.4.026 6.378L16 16V8.395H7.278zM16 0 7.33 1.244v6.414H16V0z'/>
</svg>

<br>

&copy; <?php echo $SiteName ?> - <b><script>document.write(new Date().getFullYear());</script></b></p>

<br>

<?php $myfile = fopen('assets/config/body.html', 'r'); echo fread($myfile,filesize('assets/config/body.html')); fclose($myfile); ?>

</center>

</div>

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
  echo "<button id='myBtnRandom' title='Jogo Aleat&oacute;rio' width='20' height='20' type='submit' name='random' >";
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

<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-random' viewBox='0 0 20 20'>
    <path fill-rule='evenodd' d='M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z'/>
  <path d='M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z'/>
</svg>
</button>
</form>

</body>
</html>