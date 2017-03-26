<?php
$start = microtime(true);
try {

  $path = $argv[1];
  $path = str_replace("path=", "", $path);

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

  curl_setopt($ch, CURLOPT_URL, $path);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch, CURLOPT_HEADER, 0);

  $output = curl_exec($ch);

  if ($output  === FALSE) {
    echo "cURL Error:" . curl_error($ch);
  }

  curl_close($ch);

  $obj = json_decode($output);


  $file = var_export($obj, true);
  file_put_contents( "file.txt", $file);

}

//catch exception
catch (Exception $e) {
  echo 'Oh dear, you broke it' ;
}

echo $time_elapsed_secs = microtime(true) - $start;
echo "\n";

?>
