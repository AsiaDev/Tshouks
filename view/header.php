<!DOCTYPE html>
<html>
<head>
<title><?php echo "Tshouks - {$title}";?></title>
<link href="http://btabib.dev.bbc-projects.ch/view/css/defaultStyle.css" rel="stylesheet" />
<link rel="icon" type="image/vnd.microsoft.icon"
	href="view/img/favicon-tshouks.png" />
	<meta charset="UTF-8">
</head>
<body>
	<div id="headerBar">
		<div class="container">
			<a href="http://btabib.dev.bbc-projects.ch" title="Zurück zur Homepage"><h1 id="header">Tshouks</h1></a>
			<div id="linkBar">
				<p>
					<a href="http://btabib.dev.bbc-projects.ch/NewestJokes/index?limit=20&offset=0">Neuste Witze</a> | <a
						href="http://btabib.dev.bbc-projects.ch/CreateNewJoke">Erstelle einen Witz</a> | <a
						href="http://btabib.dev.bbc-projects.ch/Default/Contact">Kontakt</a>
				</p>

			</div>
			<?php
			include ('./lib/builder/AccountBoxBuilder.php');
			?>
		</div>
	</div>
	<div id="picBox">
		<img alt="back ground header image"
			src="http://btabib.dev.bbc-projects.ch/view/img/headerPicture.jpg">
	</div>

	<div id="mainContainer">
		<div class="container">