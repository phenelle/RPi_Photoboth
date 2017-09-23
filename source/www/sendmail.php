<?php
/**
 * Show a form to the user so he can fill his email
 * It then send the postcard by email 
 *
 * @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */

  require_once('config.php');

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

  <?php if (VIRTUAL_KEYBOARD): ?>
    <!-- keyboard widget css & script -->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" />
    <link href="css/virtual_keyboard.css" />
    <link href="keyboard/Keyboard-master/css/keyboard.css" rel="stylesheet">
    <script src="keyboard/Keyboard-master/js/jquery.keyboard.js"></script>
    <script src="keyboard/Keyboard-master/js/jquery.keyboard.extension-all.js"></script>
    <script type="text/javascript" src="js/virtual_keyboard.js"></script>
  <?php endif; ?>

</head>
<body>
<body>
   <main class="main orange">
      <div class="logo"><img src="img/cubitux-logo.png" alt="cubitux"></div>
      <div class="content-wrapper">
         <form action="sendmail_form.php">
            <input type="hidden" name="lng" value="<?php echo $lng ?>">
            <input type="hidden" name="photo1" value="<?php echo $photo1 ?>">
            <input type="hidden" name="photo2" value="<?php echo $photo2 ?>">
            <input type="hidden" name="photo3" value="<?php echo $photo3 ?>">
            <input id="email-input" class="keyboard-init-focus" type="email" name="email" placeholder="<?php echo ($lng == "fr") ? 'Ecrivez votre courriel' : "Type your email" ?>" />
            <footer class="footer">
               <div class="block"><button type="reset" onclick="backHome()"><?php echo ($lng == "fr") ? "Annuler" : "Cancel" ?></button></div>
               <div class="block"><button type="submit"><?php echo ($lng == "fr") ? "Envoyer" : "Sent" ?></button></div>
            </footer>
         </form>
      </div>
   </main>
  <script type="text/javascript">
    function backHome() {
      window.location.href="/";
    }
    setTimeout(backHome, 300000);
    $(function(){
        document.getElementById('email-input').focus();
    });
  </script>
</body>
</html>
