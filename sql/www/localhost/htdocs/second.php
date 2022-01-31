<?php
$param1 = $_GET['name'];
$host="172.16.0.1";
$user="vid";
$pass="password";
$db="videoteka";
$con=pg_connect("host=$host dbname=$db user=$user password=$pass")
or die ("could not connect");
$q="select * from selectProd('$param1'::varchar);";
$res=pg_query($con,$q);
//print_r($q);
//print_r($res);
if(pg_num_rows($res))
{
	$data=array();
	while($row=pg_fetch_array($res))
	{
		//$data[] = $row['fio'];
		$data[] = ['fio'=>$row['fio']];
	}	
	header('Content-Type: application/json; charset=utf-8');
	//$data = array_slice($data, 0, -1);
	$data = str_replace("\\","",$data);
	$j = json_encode($data);	
echo($j);
}

