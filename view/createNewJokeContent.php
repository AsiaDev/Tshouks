<!--  end following tags to complete this view-component
		select, input[type=submit], form, div, div
		-->

<div id="contentColumn">
	<h2><?php echo "{$edit_type}"; ?></h2>
	<h3><?php echo "{$edit_type_subtitle}"; ?></h3>
	<div class="contentBox">
		<p><?php echo "{$edit_message}"; ?></p>
		<form action=<?php echo "{$action}";?> method="post" class="form">
			<label for="jokeText">Witz</label>
			<input type="text" name="jokeText" placeholder="Ein Witz" value='<?php echo "{$joke}"?>'> <label
				for="categorySelect">Kategorie</label> <select name="categorySelect">
				