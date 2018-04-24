<p><?php if($data['message']) { echo $data['message'];} ?></p>
<form method="POST">
    <p>
	<label>
	    <br>
	    Название
	    <br>
	    <input type="text" name="title" value="<?= $data['title']; ?>" size="255">
	</label>
    </p>
    <p>
	<label>
	    <br>
	    Контент
	    <br>
	    <textarea cols="80" rows="10" name="content"><?= $data['content'] ?></textarea>
	</label>
    </p>
    <p>
	<input type="submit" name="editFormSubmited" value="Сохранить изминения">
    </p>
</form>