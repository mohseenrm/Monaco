<?php
session_start();

$_SESSION['user-name'] = $_POST['user-name'];
$_SESSION['user-theme'] = $_POST['user-theme'];
$_SESSION['user-title'] = $_POST['user-title'];
$_SESSION['user-email'] = $_POST['user-email'];

	/* 	

	https://github.com/maxwellito/vivus
	http://www.unheap.com/user-interface/scrolling/scrollreveal-easy-scroll-animations-web-mobile-browsers/
	http://joelb.me/scrollpath/
	http://letteringjs.com/
	http://restivejs.com/
	https://macarthur.me/typeit/
	http://qrohlf.com/trianglify/#gettingstarted
	http://scrollme.nckprsn.com/
	**parallax - http://scrollmagic.io/examples/advanced/parallax_scrolling.html
	*/
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

		<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular.min.js"></script>

		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css">

		<script src="js/jquery.js"></script>

		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>

		<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster" />

		<script src="js/loadMonaco.js" defer></script>

		<title>Monaco - Distraction Free Writer</title>

		<link rel="stylesheet" type="text/css" href="css/monaco.css">
		<link rel="stylesheet" type="text/css" href="css/monacoPlayer.css">

	</head>
	<body>
		<div id="mother-wrap" ng-app="monacoApp" ng-controller="monacoControl">
			<div class="writing-title">
				<div class="title">
					<?php echo $_SESSION['user-title']; ?>	
				</div>
			</div>
			<div class="writing-theme">
				<div class="theme">
					<?php echo $_SESSION['user-theme']; ?>	
				</div>
			</div>
			<div class="main-screen">
				<span class="display-text" ng-model="displayText">{{inputText}}</span>
			</div>
			<div class="main-input">
				<input id="inputText" class="tooltip" type="text" name="user-text" ng-model="inputText" ng-keypress="assortData($event)" ng-keydown="angularDown($event)" ng-keyup="angularUp($event)" ng-blur="angularBlur()" ng-focus="angularFocus()" title="<span class='hint'>Press <swt-white-kbk>Spacebar</swt-white-kbk> to record your words.<br />Press <swt-white-kbk>Enter</swt-white-kbk> for toggling Quick View Mode.<br />Press <swt-white-kbk>Shift</swt-white-kbk>+<swt-white-kbk>Enter</swt-white-kbk> to add a new line.</span>" />
			</div>
			<div class="inception-wrapper">
				<div class="button-section">

					<!--Button Start-->
					<div class="switch-container">
						<span class="switch-text">Statistics</span><div class='toggle' id='switch'><div class='toggle-text-off'>OFF</div><div class='glow-comp'></div><div class='toggle-button'></div><div class='toggle-text-on'>ON</div></div>
					</div>
					<!--Button End-->

					<!--EditMode Button Start-->
					<div class="button-wrapper" id="edit-button">
						<section class="links" id="editor-mode">
							<nav class="link-effect-13" id="link-effect-13">
								<a id="psuedo-submit" href="monacoMode.php"><span>Editor Mode</span></a>
							</nav>
						</section>
					</div>
					<!--EditMode Button End-->

					<!--Hidden Form Start-->
					<form id="hidden-form" style="display:none;" action="monacoEditor.php" method="POST">
						<input type="text" name="hidden-data" id="hidden-data" value="" style="display:none;" />
					</form>
					<!--Hidden Form End-->

					<div id="psuedo-div"></div>

					<!--Player Button Start-->
					<div class="button-wrapper" id="edit-button">
						<section class="links" id="editor-mode">
							<nav class="link-effect-13" id="link-effect-13">
								<a id="player-button" href="#"><span>Player</span></a>
							</nav>
						</section>
					</div>
					<!--Player Button End-->

					<!--Suggestions Button Start-->
					<div class="switch-container">
						<span class="switch-text">Suggestions</span><div class='toggle' id='suggestion'><div class='toggle-text-off'>OFF</div><div class='glow-comp'></div><div class='toggle-button'></div><div class='toggle-text-on'>ON</div></div>
					</div>
					<!--Suggestions Button End-->
				</div>
			</div>

			<div class="footer">
				<div class="menu-container">
					<!--Menu Button Start-->
					<div class="menu-toggle">
						<div class="one"></div>
						<div class="two"></div>
						<div class="three"></div>
					</div>
					<!--Menu Button End-->
				</div>
			</div>
		</div>

		<!--Modal Start-->
		<div class="overlay">
			<div class="modal">
				<svg class="svg-icon" viewBox="0 0 20 20">
					<path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
				</svg>
				<div id="draft">
					<span id="draft-title">Written so far...</span>
					<span id="draft-body"></span>
				</div>
			</div>
		</div>
		<!--Modal End-->
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
<div class="extra-panel">
	<div class="stat-panel">
		<div>
			<span class="panel-title">Statistics</span>
		</div>
		<div class="row-wrap"><span>Words per minute:</span><span id="wpm">0</span></div>
		<div class="row-wrap"><span>Words:</span><span id="words">0</span></div>
		<div class="row-wrap"><span>Characters:</span><span id="characters">0</span></div>
	</div>
	<div class="psuedo-block"></div>
	<div class="suggestion-panel">
		<div>
			<span class="panel-title">Suggestions</span>
		</div>
		<div class="row-wrap"><span id="first">Loading.</span></div>
		<div class="row-wrap"><span id="second">Suggestions..</span></div>
		<div class="row-wrap"><span id="third">Please Wait...</span></div>
	</div>
</div>
<script src="js/playerControl.js" defer></script>
<script async>
	$(document).ready(function (){
						//send data via A tag!
						var littleModal = $('.overlay, .modal');
						document.getElementById("psuedo-submit").onclick = function() {
							var injectData = document.getElementById("hidden-data");
							injectData.setAttribute("value", monacoData);
							document.getElementById("hidden-form").submit();
					    	return false; // cancel the actual link
					    }

					    setTimeout(function(){
					    	$('#inputText').focus();
					    }, 800);

						//toggle autocorrect feature
						$('.toggle').click(function(e){
							e.preventDefault();
							$(this).toggleClass('toggle-on');
						});
						//modal x closes the modal window
						$('.modal svg').click(function(e) {
							littleModal.removeClass('active');
							e.preventDefault();
						});
					});
				</script>
				<script type="text/javascript" src="js/monacoSuggestion.js"></script>
			</body>
			</html>