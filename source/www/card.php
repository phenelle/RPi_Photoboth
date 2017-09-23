<?php
/**
 * Generate postcard of 3 pictures in HTML format
 * (That file is used for wkhtmltopdf to generate final version of the postcard)
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
   <style type="text/css">
     .main {
        background-color: #eaeaea;
      }
     .postcard .top > *, 
     .postcard .bottom > * {
      height: 205px;
     }
     .postcard .top .left, 
     .postcard .bottom .left,
     .postcard .top .right, 
     .postcard .bottom .right {
        text-align: center;
        width: 400px;
     }
     .postcard .top .left img {
        width: 180px;
        height: 180px;
        margin: 0 auto;
     }
     .postcard .top img, .postcard .bottom img {
        width: 360px;
        height: auto;
     }
   </style>
</head>
<body>
   <main class="main">
      <div class="content-wrapper">
         <section class="postcard" style="width:780px;height:445px; margin: 0 auto; padding-top: 0">
            <div class="top">
               <div class="left"><img src="img/cubitux-ninja-logo.jpg" alt="cubitux"></div>
               <div class="right"><img src="<?php echo $photo1 ?>" alt=""></div>
            </div>
            <div class="bottom">
               <div class="left"><img src="<?php echo $photo2 ?>" alt=""></div>
               <div class="right"><img src="<?php echo $photo3 ?>" alt=""></div>
            </div>
            <footer class="footer"><span>#ECOM MONTREAL - &copy; Cubitux 2017 </span></footer>
         </section>
      </div>
   </main>
</body>
</html>