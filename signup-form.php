<!DOCTYPE html>

<html>
  <head>
	<title>bean and boo</title>
    <link rel="stylesheet" href="/Bean&Brew.css">
	<style>
		body {
			background-image: url("/BackgroundImage.jpg.jpg")
		}
	</style>
  </head>
  <body>
	<?php include("templates/header.php"); ?>
	<form action="process-signup.php" method="post" novalidate>
		<div>
			<label for="name">Name</label>
			<input type="text" id="name" name="name">
		</div>
		<div>
			<label for="email">Email</label>
			<input type="text" id="email" name="email">
		</div>
		<div>
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
		</div>
		<div>
			<label for="password_repeat">Repeat Password</label>
			<input type="password" id="password_repeat" name="password_repeat">
		</div>
		<div>
			<button>Sign Up</button>
		</div>
	</form>
	<?php include("templates/footer.php"); ?>
  </body>
</html>
