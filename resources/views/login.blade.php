<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reyconvert - login</title>
</head>

<body>
	<form action="{{ route('login') }}" method="post">
		@csrf
		<div class="form-group">
			<label for="username">username</label>
			<input type="text" name="username" id="" required>
		</div>
		<div class="form-group">
			<label for="password">password</label>
			<input type="password" name="password" id="" required>
		</div>
		<div class="form-group">
			<input type="submit" value="login">
		</div>
	</form>
</body>

</html>
