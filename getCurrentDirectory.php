<?php

function get_current_dir(){
    // Is the user using HTTPS?
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';

    // Complete the URL
    $url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    // echo the URL
     
  
  
    return $url;
}

 echo get_current_dir();

?>

 