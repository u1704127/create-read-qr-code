<!DOCTYPE html>
<html>
<body style='max-width: 500px; margin: auto;'>

<h1>Input text to create QR Code</h1>

<form method="POST">
  <label for="">Text:</label>
  <input type="text" id="text-to-qr-code" name="text"><br><br>

  <label for="">Size(width):</label>
  <input type="number" id="text-to-qr-code" name="size"><br><br>  
  
  <input type="submit" value="Submit"><br /> <br />
</form>



</body>
</html>


<?php 
 
if(isset($_POST['text'])){
    $text = $_POST['text'];
    $size = $_POST['size'];
    echo "<h2>Text:".$text."<br /></h2>";
    echo "<h2>Size:".$size."X". $size    ."<br /></h2>";

    echo "<img src='https://api.qrserver.com/v1/create-qr-code/?data=$text&amp;size=$size"."x"."$size'>";

}

?>


