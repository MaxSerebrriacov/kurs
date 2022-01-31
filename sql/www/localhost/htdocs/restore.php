<?php
$fileNames = array_keys($_POST);

//$arg = "nfs03/".implode(" nfs03/", $fileNames);
$arg = "nfs03/".$fileNames[0];
$arg = str_replace("_", ".", $arg);

$x = "ssh -t -o PubkeyAuthentication=yes -oPreferredAuthentications=publickey -o StrictHostKeyChecking=no -i /var/www/localhost/htdocs/id_rsa postgres@172.16.0.1 'pg_restore -U postgres -d videoteka -v /home/postgres/$arg'";

$x = shell_exec($x);

header("Location: /backups.php");



