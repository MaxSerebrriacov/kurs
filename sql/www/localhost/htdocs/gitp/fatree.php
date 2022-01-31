<?php
$host="172.16.0.1";
$user="postgres";
$pass="password";
$db="family";
$con=pg_connect("host=$host dbname=$db user=$user password=$pass")
or die ("could not connect");
$q="select * from families where id_people in (select * from tri());";
$res=pg_query($con,$q);
//print_r($q);
//die();
if(pg_num_rows($res))
{
	$data=array();
	while($row=pg_fetch_array($res))
	{
		$data[] = ['id_people'=>$row['id_people'], 
		'nme'=>$row['nme'], 
		'surname'=>$row['surname'], 
		'otch'=>$row['otch'],
		'god_rogd'=>$row['god_rogd'],
		'pol'=>$row['pol'],
		'eg_dohod'=>$row['eg_dohod']];
	}
	header('Content-Type: application/json; charset=utf-8');
//$data = array_slice($data, 0, 0);
	$data = str_replace("\\","",$data);
        
	$j = json_encode($data);
echo($j);
}

