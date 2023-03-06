<?php

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

//Return Cookie and Show PopUp
if(!isset($_COOKIE['msg'])) 
{
  //Cookie is not set!
}
else 
{
  if($_COOKIE['msg'] == 'name')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The website name was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'head')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The Google Analytics code was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'body')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The Pop Under code was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'comments')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The comments code was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'banner')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The banner image was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'icon')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The favicon image was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'thumbnail')
  {
    echo '<script>window.onload = function JSalert(){	swal("Congrats!", "The thumbnail image was updated!", "success");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'bannerError')
  {
    echo '<script>window.onload = function JSalert(){	swal("Oops!", "Banner image is not selected!", "error");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'iconError')
  {
    echo '<script>window.onload = function JSalert(){	swal("Oops!", "Favicon image is not selected!", "error");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'thumbnailError')
  {
    echo '<script>window.onload = function JSalert(){	swal("Oops!", "Thumbnail image is not selected!", "error");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
  else if($_COOKIE['msg'] == 'nameError')
  {
    echo '<script>window.onload = function JSalert(){	swal("Oops!", "Type a name to your website!", "error");}</script>';
    setcookie('msg', 'null', time() + (86400 * 30));
  }
}



//Load and Save HEAD
$myfile = fopen("assets/config/head.html", "r") or die("Unable to open file!");
$SiteHead = fread($myfile,filesize("assets/config/head.html"));
fclose($myfile);

if(isset($_POST['submitHead']))
{
  $myfile = fopen("assets/config/head.html", "w") or die("Unable to open file!");
  $SiteHead = $_POST["txtNewHead"];
  fwrite($myfile, $SiteHead);
  fclose($myfile);
            
  setcookie('msg', 'head', time() + (86400 * 30));
  header("Refresh:0");
}



//Load and Save BODY
$myfile = fopen("assets/config/body.html", "r") or die("Unable to open file!");
$SiteBody = fread($myfile,filesize("assets/config/body.html"));
fclose($myfile);

if(isset($_POST['submitBody']))
{
  $myfile = fopen("assets/config/body.html", "w") or die("Unable to open file!");
  $SiteBody = $_POST["txtNewBody"];
  fwrite($myfile, $SiteBody);
  fclose($myfile);
    
  setcookie('msg', 'body', time() + (86400 * 30));
  header("Refresh:0");
}



//Load and Save Comments
$myfile = fopen("assets/config/comments.html", "r") or die("Unable to open file!");
$SiteComments = fread($myfile,filesize("assets/config/comments.html"));
fclose($myfile);

if(isset($_POST['submitComments']))
{
  $myfile = fopen("assets/config/comments.html", "w") or die("Unable to open file!");
  $SiteComments = $_POST["txtNewComments"];
  fwrite($myfile, $SiteComments);
  fclose($myfile);
                
  setcookie('msg', 'comments', time() + (86400 * 30));
  header("Refresh:0");
}



//Load and Save Website Name
$myfile = fopen("assets/config/name.html", "r") or die("Unable to open file!");
$SiteName = fread($myfile,filesize("assets/config/name.html"));
fclose($myfile);

if(isset($_POST['submitName']))
{
  if(strlen($_POST['txtNewName']) >= 4)
  {
    $myfile = fopen("assets/config/name.html", "w") or die("Unable to open file!");
    $txt = $_POST["txtNewName"];
    fwrite($myfile, $txt);
    fclose($myfile);
            
    setcookie('msg', 'name', time() + (86400 * 30));
    header("Refresh:0");
  }
  else
  {    
    setcookie('msg', 'nameError', time() + (86400 * 30));
    header("Refresh:0");
  }
}



//Save Banner Image
if(isset($_POST['submitBanner']))
{
  if($_FILES['bannerToUpload']['size'] == 0)
  {
    setcookie('msg', 'bannerError', time() + (86400 * 30));
    header("Refresh:0");
  }
  else
  {
    if(isset($_FILES['bannerToUpload']))
    {
      move_uploaded_file($_FILES['bannerToUpload']['tmp_name'], "assets/img/banner.png");

      setcookie('msg', 'banner', time() + (86400 * 30));
      header("Refresh:0");
    }
  }
}




//Save Icon Image
if(isset($_POST['submitIcon']))
{
  if ($_FILES['iconToUpload']['size'] == 0)
  {
    setcookie('msg', 'iconError', time() + (86400 * 30));
    header("Refresh:0");
  }
  else
  {
    if(isset($_FILES['iconToUpload']))
    {
      move_uploaded_file($_FILES['iconToUpload']['tmp_name'], "assets/img/favicon.png");
      
      setcookie('msg', 'icon', time() + (86400 * 30));
      header("Refresh:0");
    }
  }
}
        


//Save Thumbnail Image
if(isset($_POST['submitThumbnail']))
{
  if ($_FILES['thumbnailToUpload']['size'] == 0)
  {
    setcookie('msg', 'thumbnailError', time() + (86400 * 30));
    header("Refresh:0");
  }
  else
  {
    if(isset($_FILES['thumbnailToUpload']))
    {
      move_uploaded_file($_FILES['iconToUpload']['tmp_name'], "assets/img/thumb.png");
      setcookie('msg', 'thumbnail', time() + (86400 * 30));
      header("Refresh:0");
    }
  }
}
  
if(isset($_POST['delete'])){

  $filename = 'config.php';

  if (unlink($filename)) {
    echo 'The file ' . $filename . ' was deleted successfully!';
  } else {
    echo 'There was a error deleting the file ' . $filename;
  }
  header('Location: index.php');
  
  }
    
?>

<html>
<head>
<title>Configuration</title>
<link rel='icon' type='image/png' href='https://i.imgur.com/uzQytBK.png'>

<style>
    
@media all and (min-width:800px) and (max-width: 3000px) 
{
  
#divList { 
width: 700px;
position: absolute;
left: calc(50% - 350px);
}

}

@media all and (min-width:0px) and (max-width: 799px) 
{
  
#divList { 
width: 100%;
}

}

body {
  
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  
  color: rgb(206, 204, 204);
  background-size: 300% 800%;
  background-color: #0066cc;

}


* {
  box-sizing: border-box;
}

dl.faq button {
  display: block;
  width: 100%;
  border: none;
  border-radius: 10px;
  background-color: #85c6da;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: left;
  font-weight: bold;
}

dl dd {
  margin: 0;
  padding: 0;
  padding-bottom: 20px;
}

dl.faq .desc {
  margin: 0;
  margin-top: 1.0em;
  padding: 0.25em;
  font-size: 110%;
  display: none;
  background-color: transparent;
  border-radius: 3px;
}

dl.faq button:hover,
dl.faq button:focus {
  background-color: #07d6a0;
  color: black;
  font-weight: bold;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

dl.faq button[aria-expanded="false"]::before {
  content: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12' style='forced-color-adjust: auto;'%3E%3Cpolygon points='1 1, 1 11, 8 6' fill='currentcolor' stroke= 'currentcolor' /%3E%3C/svg%3E%0A");
  position: relative;
  left: -4px;
  font-weight: bold;
}

dl.faq button[aria-expanded="true"]::before {
  content: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12' style='forced-color-adjust: auto;'%3E%3Cpolygon points='1 1, 11 1, 6 8' fill='currentcolor' stroke= 'currentcolor' /%3E%3C/svg%3E ");
  position: relative;
  left: -8px;
  top: 4px;
  font-weight: bold;
}

a:link {
  color: #0044ff;
}
a:visited {
  color: #0044ff;
}
a:hover {
  color: #0044ff;
}
a:active {
  color: #0044ff;
}

.btnSubmit {
  background-color: #555555; 
  border: 1px solid #07d6a0;
  border-radius: 10px;
  color: white;
  padding: 14px 33px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.buttonSubmit:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  background: #f0476f;
  border: 1px solid #f0476f;
  color: white;
  
}

.btnUpdate {
  background-color: #555555; 
  border: 1px solid #07d6a0;
  border-radius: 10px;
  color: white;
  padding: 12px 33px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.buttonUpdate:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  background: #f0476f;
  border: 1px solid #f0476f;
  color: white;
  
}

#myBtnDelete {
  position: fixed;
  bottom: 20px;
  right: 30px;
  height: 50px;
  width: 50px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #555555;
  color: white;
  cursor: pointer;
  padding: 7px;
  border-radius: 7px;
}

#myBtnDelete:hover {
    background-color: #f0476f;
}


textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 3px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}

textarea:focus {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  outline-color: #07d6a0;
}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border-radius: 10px;
  border: 1px solid #555;
  font-size: 16px;
}

input[type=text]:focus,
input[type=text]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  outline-color: #07d6a0;
}


.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

input[type=file] {
  width: 100%;
  max-width: 100%;
  color: #444;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #555;
  font-size: 16px;
}

input[type=file]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #555555;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #f0476f;
  color: white;
}
</style>

<style>

a:link {
  color: #07d6a0;
  font-weight: bold;
}
a:visited {
  color: #07d6a0;
  font-weight: bold;
}
a:hover {
  color: #07d6a0;
  font-weight: bold;
}
a:active {
  color: #07d6a0;
  font-weight: bold;
}

.imgClass:hover {
  border:1px solid #07d6a0;
}

  </style>

<script>
 
class DisclosureButton {
  constructor(buttonNode) {
    this.buttonNode = buttonNode;
    this.controlledNode = false;

    var id = this.buttonNode.getAttribute('aria-controls');

    if (id) {
      this.controlledNode = document.getElementById(id);
    }

    this.buttonNode.setAttribute('aria-expanded', 'false');
    this.hideContent();

    this.buttonNode.addEventListener('click', this.onClick.bind(this));
    this.buttonNode.addEventListener('focus', this.onFocus.bind(this));
    this.buttonNode.addEventListener('blur', this.onBlur.bind(this));
  }

  showContent() {
    if (this.controlledNode) {
      this.controlledNode.style.display = 'block';
    }
  }

  hideContent() {
    if (this.controlledNode) {
      this.controlledNode.style.display = 'none';
    }
  }

  toggleExpand() {
    if (this.buttonNode.getAttribute('aria-expanded') === 'true') {
      this.buttonNode.setAttribute('aria-expanded', 'false');
      this.hideContent();
    } else {
      this.buttonNode.setAttribute('aria-expanded', 'true');
      this.showContent();
    }
  }

  onClick() {
    this.toggleExpand();
  }

  onFocus() {
    this.buttonNode.classList.add('focus');
  }

  onBlur() {
    this.buttonNode.classList.remove('focus');
  }
}

window.addEventListener(
  'load',
  function () {
    var buttons = document.querySelectorAll(
      'button[aria-expanded][aria-controls]'
    );

    for (var i = 0; i < buttons.length; i++) {
      new DisclosureButton(buttons[i]);
    }
  },
  false
);

</script>

<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">

</head>
<body>

<div class='divList' id='divList'>

<dl class="faq">
  <h1>Earn Money</h1>
  
  <dt>
    <button type="button" aria-expanded="false" aria-controls="body">Pop Under</button>
  </dt>
  <dd>
    <div id="body" class="desc">
      <p><b>1</b>: Sign Up on <a href="https://publishers.adsterra.com/referral/nnT153GHHS" target="_blank">AdsTerra</a> and register your website.</p>
      <p><b>2</b>: Paste the Pop Under code on this text box.</p>
      
      <form action="" method="POST" enctype="multipart/form-data">
      <textarea name="txtNewBody" rows="17" cols="50"><?php echo $SiteBody ?></textarea>
      <br><br>
    <input type="submit" name="submitBody" value="Update" class="btnUpdate buttonUpdate">
</form>

    </div>
  </dd>

  <dt>
    <button type="button" aria-expanded="false" aria-controls="head">Google Analytics</button>
  </dt>
  <dd>
    <div id="head" class="desc">
    <p><b>1</b>: Sign Up on <a href="https://analytics.google.com" target="_blank">Google Analytics</a> and register your website.</p>
      <p><b>2</b>: Paste the tracker code on this text box.</p>
      <p><b>This will improve the indexing of your website pages in Google search results.</b></p>
						
      <form action="" method="POST" enctype="multipart/form-data">
      <textarea name="txtNewHead" rows="17" cols="50" ><?php echo $SiteHead ?></textarea>
      <br><br>
    <input type="submit" name="submitHead" value="Update" class="btnUpdate buttonUpdate">
</form>

    </div>
  </dd>

  <h1>Website Config</h1>

  <dt>
    <button type="button" aria-expanded="false" aria-controls="name">Website Name</button>
  </dt>
  <dd>
    <div id="name" class="desc">
      
      <form action="" method="POST" enctype="multipart/form-data">
        
<table>
  <tr>
    <td style="width:100%">
    
    <input type="text" name="txtNewName" value="<?php echo $SiteName ?>">
    
    </td>
    <td>
    
    <input type="submit" name="submitName" value="Update" class="btnUpdate buttonUpdate">
    
    </td>
  </tr>
</table>

</form>

</div>
  </dd>
  <dt>
    <button type="button" aria-expanded="false" aria-controls="banner">Banner</button>
  </dt>
  <dd>
    <div id="banner" class="desc">
      
      <form action="" method="POST" enctype="multipart/form-data">

     
<table>
  <tr>
    <td style="width:100%">
    
    <input type="file" name="bannerToUpload" accept="image/png">
    
    </td>
    <td>
    
    <input type="submit" name="submitBanner" value="Submit" class="btnSubmit buttonSubmit">
    
    </td>
  </tr>
</table>

    
    <p>&nbsp;<b>Current Image:</b></p>

    <img class="imgClass" src="assets/img/banner.png" width="100%">

</form>
    </div>
  </dd>
  <dt>
    <button type="button" aria-expanded="false" aria-controls="icon">Favicon</button>
  </dt>
  <dd>
    <div id="icon" class="desc">
     
      <form action="" method="POST" enctype="multipart/form-data">

       
<table>
  <tr>
    <td style="width:100%">
    
    <input type="file" name="iconToUpload" accept="image/png" >
    
    </td>
    <td>
    
    <input type="submit" name="submitIcon" value="Submit" class="btnSubmit buttonSubmit">
    
    </td>
  </tr>
</table>


    <p>&nbsp;<b>Current Image:</b></p>

    <img src="assets/img/favicon.png" width="64" class="imgClass" >

</form>
    </div>
  </dd>
  <dt>
    <button type="button" aria-expanded="false" aria-controls="thumbnail">Thumbnail</button>
  </dt>
  <dd>
    <div id="thumbnail" class="desc">
      
      <form action="" method="POST" enctype="multipart/form-data">

       
<table>
  <tr>
    <td style="width:100%">
    
    <input type="file" name="thumbnailToUpload" accept="image/png" >
    
    </td>
    <td>
    
    <input type="submit" name="submitThumbnail" value="Submit" class="btnSubmit buttonSubmit">
    
    </td>
  </tr>
</table>


    <p>&nbsp;<b>Current Image:</b></p>

    <img src="assets/img/thumb.png" width="100%" class="imgClass">

</form>
    </div>
  </dd>

  <dt>
    <button type="button" aria-expanded="false" aria-controls="comments">Comments</button>
  </dt>
  <dd>
    <div id="comments" class="desc">
      <p>&nbsp;Access <a href="https://disqus.com" target="_blank">Disqus</a> to get get your comments code.</p>

      <form action="" method="POST" enctype="multipart/form-data">
      <textarea name="txtNewComments" rows="17" cols="50"><?php echo $SiteComments ?></textarea>
      <br><br>
    <input type="submit" name="submitComments" value="Update" class="btnUpdate buttonUpdate">
</form>
    </div>
  </dd>
  
</dl>

<center>
<p></p>

<p>Version: <a href="https://github.com/friendsinwar/Games-Download-Torrents-Website" target="_blank"><b>1.0</b></a> &copy; Powered by <a href="http://steamcommunity.com/profiles/76561199187322883" target="_blank"><b>DECO</b></a></p>
</center>
</div>

<form action='' method='post'>
<button id='myBtnDelete' title='Delete This Page' width='20' height='20' type='submit' name='delete' >
<svg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='currentColor' class='bi bi-trash3' viewBox='0 0 20 20'>
<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg>
</button>
</form>

</body>
</html>