<?php

$strId = $_GET['id'];

include 'games/' . $strId .'/db.php';

$strDownload = base64_decode($strDownload);

$file = 'games/' . $strId . '/downloads.txt';

session_start();
           if(!isset($_SESSION[$strDownloadId])) {
             $handle = fopen($file, "r"); 
             if(!$handle){ 
               } 
              else { 
                $counter = ( int ) fread ($handle,20) ;
                fclose ($handle) ;
                $counter++ ; 
                $handle = fopen($file, "w" ) ; 
                fwrite($handle,$counter) ; 
                fclose ($handle);
                $_SESSION[$strDownloadId] = $counter;
                }

           }

header("Location: " . $strDownload);

?>
