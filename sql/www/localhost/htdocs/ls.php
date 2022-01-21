<?php
// dont call sh scripts you already have an shell_exec to run stuff, say it will be a simple ls (with no args giving out a list of files with no extra info
$x = shell_exec("ssh -t -o PubkeyAuthentication=yes -oPreferredAuthentications=publickey -o StrictHostKeyChecking=no -i /var/www/localhost/htdocs/id_rsa postgres@172.16.0.1 'ls /home/postgres/nfs03 | grep .dump'");
// x contains some text
// too compicated, simplify
// php must provide a valid content-type
// see php reponse headers content type in google
//"Content-Type: application/json"
header('Content-Type: application/json; charset=utf-8'); //firefox recognized valid json
$arr = explode("\n", $x);
$arr = array_slice($arr, 0, -1);
//serialize to json
$j = json_encode($arr);
echo($j);
//echo('["a", "b", "c"]'); // a valid json array
//echo($x)
// so on browser side we get a string with file names delimited by spaces
// go to js file and process that string like shown in lab23

?>
