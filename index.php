<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="description" content="distraction free writing application">
	<meta name="keywords" content="Monaco, Monaco Writing App, Writing, Distraction Free, Youtube, Youtube Player, Simplistic, Clean, good writing, Apache License, Wysiwyg editor, wysisyg">
	<meta name="author" content="Mohseen Mukaddam">

	<title>Monaco - Distraction Free Writer</title>
	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster" />
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/index.css">

	<script src="js/jquery.js"></script>
	<script src="js/index.js" async></script>
</head>
<body>
	<div id="mother-wrap">
		<div class="monaco-wrapper">
			<h1 class="fade-in one">Monaco</h1>
		</div>
		<div class="link-wrapper">
			<div class="link-1">
				<a href="#" id="modal-button">
					<span class="thin fade-in two">Distraction</span><span class="thick fade-in three">Free</span><span class="thin fade-in four">Writer</span>
				</a>    
			</div>
		</div>
		<div class="psuedo-block"></div>
		<div class="developer-wrapper">
			<div class="link-1 fade-in five" id="before-text">
				Developed by
				<a href="http://www.mohseenrm.co.nf" id="developer">
					<span class="thick fade-in seven">Mohseen</span><span class="thin fade-in six">Mukaddam</span>
				</a>
				<a href="http://www.apache.org/licenses/LICENSE-2.0.html" id="license">
					<span class="fade-in eight">&#9400; Apache License 2.0</span>
				</a>
			</div>
		</div>
	</div>
	<div id="modal-overlay">
		<svg class="svg-icon" viewBox="0 0 20 20" id="close">
			<path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
		</svg>
		<div class="form-wrapper">
			<form action="monaco.php" method="POST" id="monaco-form">
				<div class="style-4">
					<input type="text" placeholder="Name" name="user-name" id="input-name" required autocomplete="off" />
				</div>
				<div class="style-4">
					<input type="text" placeholder="Theme" name="user-theme" id="input-theme" required autocomplete="off" />
				</div>
				<div class="style-4">
					<input type="text" placeholder="Title" name="user-title" id="input-title" required autocomplete="off" />
				</div>
				<div class="style-4">
					<input type="text" placeholder="Email" id="input-email" name="user-email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
				</div>
				<div style="display:flex; justify-content:center;">
					<button class="ph-button ph-btn-purple" id="start-button" type="submit">Begin</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>