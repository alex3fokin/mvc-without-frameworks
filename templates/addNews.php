<p><?= $data; ?></p>
<form method="POST">
    <p>
	<label>
	    <br>
	    Название
	    <br>
	    <input type="text" name="title" size="255">
	</label>
    </p>
    <p>
	<label>
	    <br>
	    Контент
	    <br>
	    <textarea cols="80" rows="10" name="content"></textarea>
	</label>
    </p>
    <p>
	<input type="submit" name="addFormSubmited" value="Добавить новость">
    </p>
</form>