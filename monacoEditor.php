<?php 
session_start();
$_SESSION['user-draft'] = $_POST['hidden-data'];
//http://stackoverflow.com/questions/27867298/how-to-create-a-button-in-tinymce-4-that-increments-font-size
//http://www.scriptscoop2.com/t/d12f9d957e9f/how-to-create-a-button-in-tinymce-4-that-increments-font-size.html
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="distraction free writing application">
	<meta name="keywords" content="Monaco, Monaco Writing App, Writing, Distraction Free, Youtube, Youtube Player, Simplistic, Clean, good writing, Apache License, Wysiwyg editor, wysisyg">
	<meta name="author" content="Mohseen Mukaddam">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster" />
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/monacoEditor.css">
	<link rel="stylesheet" type="text/css" href="css/monacoPlayer.css">

	<title>Monaco - Distraction Free Writer</title>

	<script src="js/jquery.js"></script>
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	<script src="js/monacoEditor.js"></script>
</head>
<body>
	<div id="mother-wrap">
		<h1 class="monaco">Monaco</h1>
		<div class="monaco-editor">
			<textarea id="editor">
				<h1>
					<?php 
					if ($_SESSION['user-title'] != "") {
						echo $_SESSION['user-title'];
					}
					else{
						echo "Welcome to Monaco Editor!";
					}
					?>
				</h1>
				<br />
				<?php 
				if($_SESSION['user-draft'] != ""){
					echo $_SESSION['user-draft'];
				}
				?>
			</textarea>
		</div>
		<div id="music-button">
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			viewBox="0 0 25.685 25.685" style="enable-background:new 0 0 25.685 25.685;" xml:space="preserve">
			<path d="M22.08,0.098L10.97,3.497C9.624,3.881,8.533,5.285,8.533,6.631v11.557c0,0,0,0.158,0,0.162
			c0,0-0.805-0.543-2.598-0.289c-2.633,0.374-4.768,2.395-4.768,4.515s2.135,3.419,4.768,3.045c2.635-0.372,4.566-2.331,4.566-4.452
			c0,0,0-9.066,0-10.006s1.13-1.343,1.13-1.343l9.823-3.079c0,0,1.087-0.365,1.087,0.641s0,8.031,0,8.031s0,0.002,0,0.006
			c0,0-1.001-0.576-2.794-0.358c-2.633,0.319-4.768,2.298-4.768,4.417c0,2.121,2.135,3.463,4.768,3.143
			c2.635-0.319,4.77-2.297,4.77-4.418V1.84C24.517,0.494,23.425-0.286,22.08,0.098z"/>
		</svg>
	</div>
</div>
<!--Player Modal Start-->
<div class="modal-overlay">
	<svg class="svg-icon" viewBox="0 0 20 20" id="close">
		<path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
	</svg>

	<div class="player-wrapper">
		<div id="player" style="display:none;"></div>
		<div class="title-wrapper">
			<h1 id="player-title">YouTube Player</h1>
		</div>
		<div class="url-wrapper">
			<input type="text" name="player-url" class="url-box" placeholder="URL" id="url-box"/>
		</div>
		<div class="button-wrapper" id="control-buttons">
			<svg version="1.1" id="back-button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			width="488.07px" height="488.071px" viewBox="0 0 488.07 488.071" style="enable-background:new 0 0 488.07 488.071;" xml:space="preserve">
			<path d="M238.986,244.034c0,6.895-3.683,13.276-9.654,16.723L28.958,427.954c-5.971,3.452-13.333,3.452-19.306,0
			C3.68,424.5,0,418.13,0,411.23V76.832c0-6.892,3.675-13.27,9.652-16.723c2.988-1.723,6.321-2.583,9.655-2.583
			c3.341,0,6.663,0.864,9.655,2.583l200.379,167.2C235.304,230.759,238.986,237.137,238.986,244.034z M478.429,227.314
			l-200.386-167.2c-2.978-1.724-6.312-2.583-9.651-2.583s-6.653,0.864-9.654,2.583c-5.973,3.453-9.652,9.825-9.652,16.723v334.4
			c0,6.893,3.68,13.271,9.652,16.721c5.976,3.447,13.33,3.447,19.306,0l200.373-167.202c5.976-3.441,9.654-9.816,9.654-16.717
			C488.08,237.142,484.392,230.759,478.429,227.314z"/>
		</svg>
		<svg version="1.1" id="pause-button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		width="357px" height="357px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
		<path d="M25.5,357h102V0h-102V357z M229.5,0v357h102V0H229.5z"/>
	</svg>
	<svg version="1.1" id="play-button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	viewBox="0 0 415.346 415.346" style="enable-background:new 0 0 415.346 415.346;" xml:space="preserve">
	<path d="M41.712,415.346c-11.763,0-21.3-9.537-21.3-21.3V21.299C20.412,9.536,29.949,0,41.712,0l346.122,191.697
	c0,0,15.975,15.975,0,31.951C371.859,239.622,41.712,415.346,41.712,415.346z"/>
</svg>
<svg version="1.1" id="forward-button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="488.07px" height="488.071px" viewBox="0 0 488.07 488.071" style="enable-background:new 0 0 488.07 488.071;" xml:space="preserve">
<path d="M238.986,244.034c0,6.895-3.683,13.276-9.654,16.723L28.958,427.954c-5.971,3.452-13.333,3.452-19.306,0
C3.68,424.5,0,418.13,0,411.23V76.832c0-6.892,3.675-13.27,9.652-16.723c2.988-1.723,6.321-2.583,9.655-2.583
c3.341,0,6.663,0.864,9.655,2.583l200.379,167.2C235.304,230.759,238.986,237.137,238.986,244.034z M478.429,227.314
l-200.386-167.2c-2.978-1.724-6.312-2.583-9.651-2.583s-6.653,0.864-9.654,2.583c-5.973,3.453-9.652,9.825-9.652,16.723v334.4
c0,6.893,3.68,13.271,9.652,16.721c5.976,3.447,13.33,3.447,19.306,0l200.373-167.202c5.976-3.441,9.654-9.816,9.654-16.717
C488.08,237.142,484.392,230.759,478.429,227.314z"/>
</svg>
</div>
<div class="ranges">
	<input class="disc" type="range" min="0" max="100" step="5" value="100" />
</div>
</div>
<div class="hint-wrapper">
	<div class="player-hint">Paste URL and hit ENTER</div>
</div>
</div>
<!--Player Modal End-->
<script async>
	tinymce.init({
		selector: '#editor',
		theme: 'modern',
		plugins: [
		'advlist autolink autosave lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools fullpage',
		'spellchecker code'
		],
		toolbar1: 'insertfile undo redo | styleselect | bold italic | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
		toolbar2: 'print preview | link image media | forecolor backcolor emoticons | code fullpage',
		image_advtab: true,
		templates: [
		{ title: 'Test template 1', content: 'Test 1' },
		{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
		'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
		'//www.tinymce.com/css/codepen.min.css'
		],
		fullpage_default_title: "<?php echo $_SESSION['user-title'];?> - Created in Monaco App",
		browser_spellcheck: true,
		contextmenu: false,
		theme_advanced_font_sizes : "8px,10px,12px,14px,16px,18px,20px,24px,32px,36px,48px,60px,72px",
		theme_advanced_fonts : "Andale Mono=andale mono,times;"+
		"Arial=arial,helvetica,sans-serif;"+
		"Arial Black=arial black,avant garde;"+
		"Book Antiqua=book antiqua,palatino;"+
		"Comic Sans MS=comic sans ms,sans-serif;"+
		"Courier New=courier new,courier;"+
		"Century Gothic=century_gothic;"+
		"Georgia=georgia,palatino;"+
		"Gill Sans MT=gill_sans_mt;"+
		"Gill Sans MT Bold=gill_sans_mt_bold;"+
		"Gill Sans MT BoldItalic=gill_sans_mt_bold_italic;"+
		"Gill Sans MT Italic=gill_sans_mt_italic;"+
		"Helvetica=helvetica;"+
		"Impact=impact,chicago;"+
		"Iskola Pota=iskoola_pota;"+
		"Iskola Pota Bold=iskoola_pota_bold;"+
		"Symbol=symbol;"+
		"Tahoma=tahoma,arial,helvetica,sans-serif;"+
		"Terminal=terminal,monaco;"+
		"Times New Roman=times new roman,times;"+
		"Trebuchet MS=trebuchet ms,geneva;"+
		"Verdana=verdana,geneva;"+
		"Webdings=webdings;"+
		"Wingdings=wingdings,zapf dingbats",
		fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 60pt 72pt 84pt 96pt"
	});
</script>
<script src="js/playerControl.js" defer></script>
</body>
</html>