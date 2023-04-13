<!DOCTYPE html>
<html>
<body style='max-width: 500px; margin: auto;'>

<h1>Select file to inside the <i>upload</i> folder</h1>

<form method="POST" enctype="multipart/form-data">
  <label for="">Select File:</label>
  <input type="file" id="text-to-qr-code" name="file_name"><br><br>
 
  <input type="submit" value="Submit"><br /> <br />
</form>



</body>
</html>


<?php 


if(isset($_FILES['file_name'])){
    $file=$_FILES['file_name'];
    echo "<h3> Name of Uploaded File:".$file['name']."</h3>";
    $x = move_uploaded_file($file['tmp_name'], "upload/".$file['name']);
      if($x)
          {
              echo "<br /><h3> successfully uploaded</h3>";
          }
 }

else{
    echo "<h3>Please select a file</h3>";
}
echo "<hr /><hr />";
?>


<h2> Scanned Text</h2>

<?php

if(isset($_FILES['file_name'])){
        include 'getCurrentDirectory.php';
        $file_location = get_current_dir();
        $url = 'http://api.qrserver.com/v1/read-qr-code/';
        $data = array('fileurl' =>$file_location."/upload/".$file );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if(curl_errno($ch)){
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        echo ($response);
        echo "<br />";
        $array = explode("data",$response);

        $array2 = explode("\"",$array[1]);

        echo var_dump($array2); 
        echo $array2[2];



}
?>