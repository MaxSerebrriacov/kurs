<?php
$param = $_GET['param'];

$host="172.16.0.1";
$user="postgres";
$pass="password";
$db="videoteka";
$con=pg_connect("host=$host dbname=$db user=$user password=$pass")
or die ("could not connect");
$q="select * from selectallindustry('$param');";
//print_r($q);
$res=pg_query($con,$q);
if(pg_num_rows($res))
{
	$data=array();
	while($row=pg_fetch_array($res))
	{
		//$data[] = $row['fio'];
		$data[] = ['id'=>$row['id'], 'name'=>$row['name']];
	}	
	header('Content-Type: application/json; charset=utf-8');
//	$data = array_slice($data, 0, -1);
	$data = str_replace("\\","",$data);
	$j = json_encode($data);
	echo($j);
}

