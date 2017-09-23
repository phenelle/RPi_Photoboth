<?php
/**
 * Show camera stream to the user
 * Takes 3 pictures sequentially
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
   <link rel="stylesheet" type="text/css" href="css/style.css" />
   <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
   <img id="video" src="http://127.0.0.1:8080/stream/video.mjpeg" alt="" />
   <div id="flash"></div>
   <div id="count"></div>
   <script type="text/javascript">
      var divCounter;
      var streamUrl = 'http://127.0.0.1:8080/stream/video.mjpeg';
      var photos = [];

      function takeSnap() {
         countDown();
      }

      function showCounter(cnt) {
        divCounter.innerHTML=cnt;
      }

      function countDown() {
        divCounter = document.getElementById('count');
        divCounter.style.display = 'block';
        setTimeout('showCounter("3")', 500);
        setTimeout('showCounter("2")', 1500);
        setTimeout('showCounter("1")', 2500);
        if (photos[0] == null) {
         setTimeout('snap(0)', 3500);
        } else if (photos[1] == null) {
         setTimeout('snap(1)', 3500);
        } else {
         setTimeout('snap(2)', 3500);
        }
        
      }

      function snap(index) {
        jQuery.ajax({
         url: '/snap.php?nocache=' + Date.now(),
         async: false,
         success: function (result) {
           photos[index] = result;
           if (index != 2) {
            flash();
            setTimeout('countDown()', 100);
           } else {
            flash();
            setTimeout('goToPreview()', 100);
           }
         }
        });
      }

      function flash() {
         $('#flash').addClass('snap');
         divCounter.style.display = 'none';
         setTimeout('$("#flash").removeClass("snap");', 100);
      }

     function backHome() {
       window.location.href="/";
     }

      function goToPreview() {
        window.location.href='/page4.php?lng=<?php echo $lng ?>&photo1=' + photos[0] + '&photo2=' + photos[1] + '&photo3=' + photos[2];
      }

     setTimeout(backHome, 60000);
     setTimeout(takeSnap, 1000);
   </script>
</body>
</html>
