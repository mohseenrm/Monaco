var monacoTheme, monacoTitle, monacoEmail;
monacoEmail = monacoTitle = monacoTheme = false;
$(document).ready(function(){
	var modal = $("#modal-overlay");
	var motherWrap = $("#mother-wrap");
	var button = $("#start-button");
	//first priority -> dont see red
	modal.hide();
    modal.css("opacity", "1");

	$("#modal-button").on('click', function(e){
		e.preventDefault();
		motherWrap.fadeToggle();
		modal.fadeToggle();
	});

	$("#close").on('click', function(e){
		e.preventDefault();
		motherWrap.fadeToggle();
		modal.fadeToggle();
	});

	var nameField, themeField, titleField, emailField;
	nameField = $("#input-name");
	themeField = $("#input-theme");
	titleField = $("#input-title");
	emailField = $("#input-email");

	themeField.hide();
	titleField.hide();
	emailField.hide();
	button.hide();

	nameField.keyup(function(){
		if ($(this).val() != "") {
			themeField.fadeIn(500);
			monacoTheme = !monacoTheme;
		}
	});

	themeField.keyup(function(){
		if ($(this).val() != "") {
			titleField.fadeIn(500);
			monacoTheme = !monacoTheme;
		}
	});

	titleField.keyup(function(){
		if ($(this).val() != "") {
			emailField.fadeIn(500);
			monacoTitle = !monacoTitle;
		}
	});

	emailField.keyup(function(){
		if ($(this).val() != "") {
			button.fadeIn(500);
			monacoEmail = !monacoEmail;
		}
	});

});