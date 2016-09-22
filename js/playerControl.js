var playerReadyFlag = false;
var youTubePlayer;
var done = false;

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function getVideoTitle(){
	var title = youTubePlayer.getVideoData().title;
	if(title != ""){
		return title;
	}
	else{
		return "YouTube Player";
	}
}
function onYouTubeIframeAPIReady() {
	youTubePlayer = new YT.Player('player', {
		height: '10',
		width: '10',
		events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

function onPlayerReady(event) {
	playerReadyFlag = true;
	event.target.setVolume(100);
}
function onPlayerStateChange(event) {
	var playerTitle = $("#player-title");
	if(playerReadyFlag){
		playerTitle.text(getVideoTitle());
	}
}

$(document).ready(function(){
	var playlistId, index, slider, title, urlBox, pauseButton, playButton, hint;
	pauseButton = $('#pause-button');
	playButton = $('#play-button');
	hint = $(".player-hint");
	pauseButton.hide();
	

	slider = $(".disc");
    title = $("#player-title");
    urlBox = $('#url-box');

    var listener = function() {
        title.text(slider.val());
        if(playerReadyFlag){
        	youTubePlayer.setVolume(slider.val());
        }
    };

    slider.on("mousedown", function(){
        listener();
        slider.on("mousemove", listener);
    });

    slider.on("mouseup", function(){
        title.text(getVideoTitle());
        slider.off("mousemove", listener);
    });

    slider.on("touchstart", function(){
        listener();
        slider.on("touchmove", listener);
    });

    slider.on("touchend", function(){
        title.text(getVideoTitle());
        slider.off("touchmove", listener);
    });

	index = 0;
	playlistId = "";
	playButton.on("click", function(){
		if (playerReadyFlag) {
			youTubePlayer.playVideo();
		}
		$(this).hide();
		pauseButton.show();
	});
	urlBox.focus(function(){
		hint.fadeToggle();
	});
	urlBox.blur(function(){
		hint.fadeToggle();
	});
	//load the video Start
	urlBox.keypress(function(event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13') {
			var link;
			link = urlBox.val();
			if(playerReadyFlag){
				var result = link.search("list=");
				if(result > 0){
					index = link.search("index=");

					if(index > 0){
						index = link.split("index=")[1].split("&");
						index = index[0];
						index -= 1;
					}

					result = link.split("list=")[1].split("&");
					playlistId = result[0];

					youTubePlayer.loadPlaylist({
						list: playlistId,
						listType: "playlist",
						suggestedQuality: "small",
						index: index
					});
					youTubePlayer.setPlaybackQuality("small");
				}
				else{
					// write for format /v/videoId
					//also for format http://youtu.be/videoId

					/*
					if(link.search("/v/") > 0){
						result = link.split("/v/")[1].split("&");
						result = result[0];
						youTubePlayer.loadVideoById({
							videoId: result,
							suggestedQuality: "small"
						});
						youTubePlayer.setPlaybackQuality("small");
					}
					else if(link.search("tu.be") > 0){
						result = link.split("be/")[1].split("&");
						result = result[0];
						youTubePlayer.loadVideoById({
							videoId: result,
							suggestedQuality: "small"
						});
						youTubePlayer.setPlaybackQuality("small");
					}
					else{
						result = link.split("v=")[1].split("&");
						result = result[0];
						youTubePlayer.loadVideoById({
							videoId: result,
							suggestedQuality: "small"
						});
						youTubePlayer.setPlaybackQuality("small");
					}
					*/
					result = link.split("v=")[1].split("&");
					result = result[0];
					youTubePlayer.loadVideoById({
						videoId: result,
						suggestedQuality: "small"
					});
					youTubePlayer.setPlaybackQuality("small");
				}
			}
		}
	});
	
	pauseButton.on("click", function(){
		if (playerReadyFlag) {
			youTubePlayer.pauseVideo();
		}
		$(this).hide();
		playButton.show();
	});
	$('#back-button').on("click", function(){
		if (playerReadyFlag) {
			youTubePlayer.previousVideo();
		}
	});
	$('#forward-button').on("click", function(){
		if (playerReadyFlag) {
			youTubePlayer.nextVideo();
		}
	});
});