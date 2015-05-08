<html>
<head>
<title>Tshouks - Home</title>
<link href="css/defaultStyle.css" rel="stylesheet" />
</head>
<body>
	<div id="headerBar">
		<div class="container">
			<h1 id="header">Tshouks</h1>
			<div id="linkBar">
				<p>
					<a href="index.php" class="active">Home</a> | <a
						href="index.php?type=NewestJokes">Newest Jokes</a> | <a
						href="index.php?type=BestJokes">Best Jokes</a> | <a
						href="index.php?type=NewJoke">Create new Joke</a> | <a
						href="index.php?type=Contact">Contact</a>
			
			</div>
			<div id="account">
				<a href="index.php?type=LogIn">Log In</a> or
				<button>Sign Up</button>
			</div>
		</div>
	</div>
	<div id="picBox">
		<img alt="lorempixel" src="http://lorempixel.com/1920/300">
	</div>
	<div id="mainContainer" class="container">
		<div id="categoryColumn">
			<h2>Categories</h2>
			<div class="contentBox categories">
				<p>
					<a href="index.php?category" class="active">Category</a>
				</p>
			<?php
			for($i = 0; $i < 20; $i ++) {
				echo '<p><a href="index.php?category' . $i . '">Category' . $i . '</a></p>';
			}
			?>
			</div>
		</div>
		<div id="jokeColumn">
			<h2>Category</h2>
			<?php
			for($i = 0; $i < 5; $i ++) {
				echo '<div class="contentBox">
				<h3>Joke title</h3>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
					nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
					erat, sed diam voluptua. At vero eos et accusam et justo duo
					dolores et ea rebum. 
				</p>
			</div>';
			}
			?>
		</div>
		<div id="adversationColumn">
			<h2>Search</h2>
			<div class="contentBox">
				<input id="inputTextSearch" type="text" name="search">
				<button id="buttonSearch">go</button>
			</div>
			<h2>Adversation</h2>
			<img src="http://lorempixel.com/195/500"/>
		</div>
	</div>
</body>
</html>