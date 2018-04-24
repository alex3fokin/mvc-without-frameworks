<?php
if ($data["status"] === 1) {
    $bgColor = "#b2f7ba";
} else {
    $bgColor = "#f7b8b1";
}
?>
<style>
    body {
	overflow: hidden;
	background: #333333;
	height: 100vh;
    }
    .form-wrapper {
	display: flex;
	flex-flow: column;
	justify-content: center;
	height: 100%;
    }
    form {
	background-color: #fff;
	display: flex;
	margin: 0 auto;
	flex-flow: column;
	justify-content: center;
	align-items: center;
    }

    form div:first-child {
	padding: 25px 0;
	color: #fff;
	margin: 0;
	background: yellowgreen;
	width: 100%;
	text-align: center;
    }

    form div {
	margin: 15px 0;
	padding: 0 50px;
    }

    form label span {
	display: none;
    }

    input[type='text'],
    input[type='password'] {
	height: 36px;
	padding: 5px;
    }

    input[type='text']:focus,
    input[type='password']:focus {
	outline: 1px solid yellowgreen;
    }

    input[type='submit'] {
	cursor: pointer;
	border: none;
	background-color: yellowgreen;
	border: 1px solid yellowgreen;
	color: #fff;
	padding: 15px;
	transition: all .3s ease-in-out;
    }
    input[type='submit']:hover {
	background-color: #fff;
	color: yellowgreen;
	border: 1px solid yellowgreen;
    }

    a  {
	text-align: center;
    }
</style> 
<div class="form-wrapper">
    <p style="<?php if(!$data["message"]) echo "display:none;" ?> background-color:<?= $bgColor; ?>; padding: 50px; text-align: center;"><?= $data["message"]; ?></p>
    <form method="POST">
	<div>Log in</div>
	<div>
	    <label>
		<span>Login</span>
		<input type="text" name="login" value="<?= $data['oldData']['login'] ?>" required placeholder="Login">
	    </label>
	</div>
	<div>
	    <label>
		<span>Password</span>
		<input type="password" name="password" required placeholder="Password"> 
	    </label>
	</div>
	<div>
	    <input type="submit" name="loginFormSubm" value="Log in">
	</div>
	<div>
	    <a href="/auth/register">Sign Up</a>
	</div>
    </form>
</div>