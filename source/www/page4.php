<?php
/**
 * Show postcard to the user
 * Allow to send by mail or restart the whole process
 *
 * @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */
  $lng = $_REQUEST['lng'];
  $photo1 = $_REQUEST['photo1'];
  $photo2 = $_REQUEST['photo2'];
  $photo3 = $_REQUEST['photo3'];
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
   <main class="main postcard-wrapper">
      <div class="logo"><img src="img/cubitux-logo.png" alt="cubitux"></div>
      <div class="content-wrapper">
         <section class="postcard">
            <div class="top">
               <div class="left"><img src="img/cubitux-ninja-logo.jpg" alt="cubitux"></div>
               <div class="right"><img src="<?php echo $photo1 ?>" alt=""></div>
            </div>
            <div class="bottom">
               <div class="left"><img src="<?php echo $photo2 ?>" alt=""></div>
               <div class="right"><img src="<?php echo $photo3 ?>" alt=""></div>
            </div>
            <aside class="aside"><span>www.cubitux.ca</span></aside>
            <footer class="footer"><span>#ECOM MONTREAL 2017</span></footer>
         </section>
         <div class="buttons-vertical">
            <button class="btn orange" onclick="sendMail();"><?php echo ($lng == "fr") ? "Envoyer par courriel" : "Email it to me" ?></button>
            <button class="btn transparent" onclick="backHome();"><?php echo ($lng == "fr") ? "Recommencer" : "Start over" ?></button>
         </div>
      </div>
   </main>
   <script type="text/javascript">
     function backHome() {
       window.location.href="/";
     }
     function sendMail() {
       window.location.href="/sendmail.php?lng=<?php echo $lng . '&photo1=' . $photo1 . '&photo2=' . $photo2 . '&photo3=' . $photo3 ?>";
     }
     setTimeout(backHome, 60000);
   </script>
</body>
</html>