<?php
$x = shell_exec("ssh -t -o PubkeyAuthentication=yes -oPreferredAuthentications=publickey -o StrictHostKeyChecking=no -i /var/www/localhost/htdocs/id_rsa postgres@172.16.0.1 'sh /home/postgres/nfs03/cr_backup.sh'");

