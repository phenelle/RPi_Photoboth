<?php
/**
 * Homepage (cycle between slide)
 *
 * @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */
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
      <div class="logo"><img src="img/cubitux-logo.png" alt="cubitux" ondblclick="poweroff()"></div>
      <div class="slideshow">
         <ul>
            <li class="li-p1">
               <!-- <span class="color-filter"></span> --><img src="img/1.jpg" alt="Photo 1" width="800" height="480"/>
               <div class="buttons-language">
                  <button class="btn" onclick="movePage2('en');">English</button>
                  <button class="btn" onclick="movePage2('fr');">Français</button>
               </div>
            </li>
            <li class="li-p2">
               <!-- <span class="color-filter"></span> --><img src="img/2.jpg" alt="Photo 2" width="800" height="480"/>
               <div class="buttons-language">
                  <button class="btn" onclick="movePage2('en');">English</button>
                  <button class="btn" onclick="movePage2('fr');">Français</button>
               </div>
            </li>
            <li class="li-p3">
               <!-- <span class="color-filter"></span> --><img src="img/3.jpg" alt="Photo 3" width="800" height="480"/>
               <div class="buttons-language">
                  <button class="btn" onclick="movePage2('en');">English</button>
                  <button class="btn" onclick="movePage2('fr');">Français</button>
               </div>
            </li>
            <li class="li-p4">
               <!-- <span class="color-filter"></span> --><img src="img/4.jpg" alt="Photo 4" width="800" height="480"/>
               <div class="buttons-language">
                  <button class="btn" onclick="movePage2('en');">English</button>
                  <button class="btn" onclick="movePage2('fr');">Français</button>
               </div>
            </li>
         </ul>
      </div>

   </main>
   <script type="text/javascript">
		var reboot = 0;
		function resetPoweroff() {
			reboot = 0;
		}

		function poweroff() {
			if (reboot == 5) {
				window.location.href="poweroff.php";
			}
			reboot++;
			setTimeout(resetPoweroff, 10000);
		}

		function movePage2(lng) {
		  window.location.href="page2.php?lng=" + lng;
		}
		$(function(){
			setInterval(function(){
			   $(".slideshow ul").animate({marginLeft:-800},800,function(){
			      $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
			   });
			}, 15000);
		});
   </script>
</body>
</html>
