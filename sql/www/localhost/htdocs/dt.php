<?php
$param = $_GET['param'];

$host="172.16.0.1";
$user="vid";
$pass="password";
$db="videoteka";
$con=pg_connect("host=$host dbname=$db user=$user password=$pass")
or die ("could not connect");
$q="select * from selectap() where fio like '%$param%';";
$res=pg_query($con,$q);
//$res = str_replace("select * from selectap() where fio like '%$param%';","",$res);
//print_r($res);
if(pg_num_rows($res))
{
	$data=array();
	while($row=pg_fetch_array($res))
	{
		//$data[] = $row['fio'];
		$data[] = ['fio'=>$row['fio'], 'role'=>$row['role']];
	}	
	header('Content-Type: application/json; charset=utf-8');
	//$data = array_slice($data, 0, -1);
	$data = str_replace("\\","",$data);
	$j = json_encode($data);
	echo($j);
}

