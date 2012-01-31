<html>
<head>
	<title>Choose a document to compile</title>
</head>
<body>
	<form>
		<select name="compile">
<?php foreach($choices as $choice) : ?>
			<option value="<?php echo $choice ?>"><?php echo $choice ?></option>
<?php endforeach ?>
		</select>
		<input type="submit">
	</form>
</body>
</html>