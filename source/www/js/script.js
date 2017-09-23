/*
 * Quick and dirty javascript to snap and countdown
 */
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

function goToPreview() {
  window.location.href='/preview.php?photo1=' + photos[0] + '&photo2=' + photos[1] + '&photo3=' + photos[2];
}

function backHome() {
  window.location.href='/';
}
