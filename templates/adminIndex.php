<table>
    <tr>
	<th>ID</th>
	<th>Title</th>
	<th>Action</th>
    </tr>
    <?php foreach($data as $newsItem): ?>
    <tr>
	<td><?= $newsItem['id']; ?></td>
	<td><?= $newsItem['title'] ?></td>
	<td>
	    <a href="/admin/delete/<?= $newsItem['id']; ?>">X</a>
	    <a href="/admin/edit/<?= $newsItem['id']; ?>">✎</a>
	</td>
    </tr>
    <?php endforeach; ?>
</table>