// Lấy phần tử video
var video = document.getElementById("video");
// Lấy phần tử nút
var nut = document.getElementById("myBtn");
function myFunction(){
	if(video.paused){
		video.play();
		nut.innerHTML = "Dừng";
	}
	else{
		video.pause();
		nut.innerHTML = "Phát";
	}
}




