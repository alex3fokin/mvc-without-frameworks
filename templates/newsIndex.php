<section>
    <h1>Новости</h1>
    <?php foreach ($data as $newsItem): ?>
        <article>
	    <h2><a href="news/<?= $newsItem['id'] ?>"><?= $newsItem['title'] ?></a></h2>
        </article>
    <?php endforeach; ?>
</section>

