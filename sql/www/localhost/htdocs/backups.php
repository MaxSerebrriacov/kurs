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
	<form method="post" action="delete_bc.php">
		<div class="block" id="block-ls"></div>
		<input type="submit" id="button-bl" value="Delete backup">
		<div class="block" id="block-log"></div>	
	</form>	
	<form method="post" action="restore.php">
		<div class="block" id="block-ls"></div>
		<input type="submit" id="button-rs" value="Restore backup">
		<div class="block" id="block-log"></div>
	</form>
</body>
</html>
