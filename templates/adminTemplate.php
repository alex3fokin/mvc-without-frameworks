<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
	<style>
	.d-flex {
	    display: flex;
	}
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	.content {
	    padding: 15px;
	}
	input, textarea {
	    width: 100%;
	}
    </style>
    </head>
    <body>
	<div class="d-flex">
	    <div class="nav">
		<p>Меню</p>
		<p><a href="/admin">Все новости</a></p>
		<p><a href="/admin/add">Добавить новость</a></p>
		<p><a href="/auth/signout">Выйти</a></p>
	    </div>
	    <div class="content">
		<h1 style="text-align: center">Админ панель</h1>
		<?php require_once $contentTemplatePath; ?>
	    </div>   
	</div>
    </body>
</html>