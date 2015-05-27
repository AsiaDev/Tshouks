<!--  end following tags to complete this view-component
		select, form, div, div
		-->

<div id="contentColumn">
	<h2>Neue Witze erstellen</h2>
	<h3>Neuer Witz</h3>
	<div class="contentBox">
		<p>Fülle die Felder aus um einen neuen Witz zu erstellen</p>
		<form action="http://tshouks/CreateNewJoke/Create" method="post">
			<label for="titleText">Titel</label> <input type="text"
				name="titleText" placeholder="Titel"> <label for="jokeText">Joke</label>
			<input type="text" name="jokeText" placeholder="Ein Witz"> <label
				for="categorySelect">Kategorie</label> <select name="categorySelect">