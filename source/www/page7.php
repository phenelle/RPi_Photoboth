<?php
/**
 * Confirmation's message when mail successfully sent
 *
 * @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */
  $lng = $_REQUEST['lng'];
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cubitux PhotoBooth</title>
   <meta http-equiv="Cache-Control" content="no-cache" />
   <meta http-equiv="Pragma" content="no-cache" />
   <meta http-equiv="Expires" content="0" />
   <link rel="stylesheet" type="text/css" href="fonts/poppins.css" />
   <link rel="stylesheet" type="text/css" href="stylesheets/styles.css" />
   <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
   <main class="main orange">
      <div class="logo"><img src="img/cubitux-logo.png" alt="cubitux"></div>
      <div class="content-wrapper">
         <div class="submit-success">
            <h1><?php echo ($lng == "fr") ? 'ENVOYÉ' : 'SENT' ?></h1>
         </div>
      </div>
   </main>
   <script type="text/javascript">
     function backHome() {
       window.location.href="/";
     }
     setTimeout(backHome, 5000);
   </script>
</body>
</html>
