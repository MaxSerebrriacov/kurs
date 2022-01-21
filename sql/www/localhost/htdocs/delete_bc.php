<?php
$fileNames = array_keys($_POST);

$args = "nfs03/".implode(" nfs03/", $fileNames);

$args = str_replace("_", ".", $args);

$x = "ssh -t -o PubkeyAuthentication=yes -oPreferredAuthentications=publickey -o StrictHostKeyChecking=no -i /var/www/localhost/htdocs/id_rsa postgres@172.16.0.1 'rm $args'";

$x = shell_exec($x);

header("Location: /backups.php");
