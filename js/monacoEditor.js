$(document).ready(function (){
	var musicButton, modalOverlay, motherWrap;
	musicButton = $("#music-button");
	modalOverlay = $(".modal-overlay");
	motherWrap = $("#mother-wrap");

	modalOverlay.hide();
	modalOverlay.css("opacity", "1");
	//alert("hidden overlay");
	musicButton.on("click", function(){
		motherWrap.fadeToggle();
		modalOverlay.fadeToggle();
	});

	$("#close").on("click", function(){
		modalOverlay.fadeToggle();
		motherWrap.fadeToggle();
	});
});