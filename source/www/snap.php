<?php
/**
 * This file takes a JPG from the MJPEG stream 
 * and save it to a local folder, and then return 
 * a relative path to the image
 *
* @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */
  $filename = 'img/snaps/snap-' . date('Ymd-H:i:s') . '.jpg';
  shell_exec("wget --output-document=/var/www/html/" . $filename . " http://127.0.0.1:8080/stream/snapshot.jpeg?delay_s=0");
  echo $filename;
?>