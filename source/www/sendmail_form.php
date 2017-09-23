<?php
/**
 * This file will generate a PDF postcard using template + picture
 * It then send the postcard by email 
 *
 * @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */

  require_once('config.php');

  $lng = $_REQUEST['lng'];
  $email = $_REQUEST['email'];
  $photo1 = urlencode($_REQUEST['photo1']);
  $photo2 = urlencode($_REQUEST['photo2']);
  $photo3 = urlencode($_REQUEST['photo3']);
  
  $url = "http://127.0.0.1/card.php?lng=" . $lng . '&photo1=' . $photo1 . '&photo2=' . $photo2 . '&photo3=' . $photo3 ;
  $tmp = "/tmp/output-" . date('U') . '.ps';
  $jpg = "/tmp/output-" . date('U') . '.jpg';

  putenv("DISPLAY=:0");
  $cmd = 'wkhtmltoimage --load-error-handling ignore --quality 100 --width 800 --height 480 "'.$url.'" "'.$jpg.'"';
  shell_exec($cmd);

  require 'PHPMailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  //$mail->SMTPDebug  = 1;
  $template = $lng == 'en' ? 'email_template_en.html' : 'email_template_fr.html';
  $html = file_get_contents($template);

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = MAIL_HOST;                              // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = MAIL_USER;                          // SMTP username
  $mail->Password = MAIL_PASSWD;                        // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = MAIL_PORT;                              // TCP port to connect to

  $mail->setFrom(MAIL_FROM);
  $mail->addAddress($email);                            // Add a recipient

  $mail->AddEmbeddedImage($jpg, 'souvenir', 'souvenir_cubitux_ecom2017.jpg');     // Add attachments
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = $lng == 'en' ? 'A souvenir of your visit to the Cubitux kiosk' : 'Un souvenir de votre passage au kiosque Cubitux';
  $mail->Body    = $html;
  $mail->AltBody = '';

  if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
    header('Location: page-erreur.php?lng='.$lng);
  } else {
    header('Location: page7.php?lng='.$lng);
  }
