<?php
/**
 * Display instruction
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
   <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
   <main class="main">
      <div class="logo"><img src="img/cubitux-logo.png" alt="cubitux"></div>
      <div class="content-wrapper">
         <h1><?php echo ($lng == "fr") ? "Nous allons prendre 3 photos": "We are going to take 3 photos" ?></h1>
         <div class="buttons-action">
            <button class="btn" onclick="movePage3('<?php echo ($lng) ?>');"><?php echo ($lng == "fr") ? "Je suis pr&ecirc;t": "I'm ready!" ?></button>
         </div>
      </div>
   </main>
   <script type="text/javascript">
     function backHome() {
       window.location.href="/";
     }
     function movePage3(lng) {
       window.location.href="page3.php?lng=" + lng;
     }
     setTimeout(backHome, 30000);
   </script>
</body>
</html>
