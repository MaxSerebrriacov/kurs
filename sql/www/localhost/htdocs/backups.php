<!docktype html>
<html>
<head>
	<title>first page</title>
</head>
<body>
	<script src = "js/sh_backups.js"></script>
	<div>
		<button onClick="window.location.href='/index.php'">Go back</button>
		<button id="button-ls">Ls</button>
		<button id="button-bc">Create backup</button>
	
	</div>
	<div id="time"></div>
	<form method="post">
		<div class="block" id="block-ls"></div>
		<input type="submit" onclick="this.form.action='/delete_bc.php'" id="button-bl" value="Delete backup">
		<input type="submit" onclick="this.form.action='/restore.php'" id="button-bl" value="Restore backup">
		<div class="block" id="block-log"></div>	
	</form>	
</body>
</html>
