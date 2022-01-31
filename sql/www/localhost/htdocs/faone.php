<?php
$param1 = $_GET['name'];
$param2 = $_GET['familia'];
$param3 = $_GET['othestvo'];
$host="172.16.0.1";
$user="postgres";
$pass="password";
$db="family";
$con=pg_connect("host=$host dbname=$db user=$user password=$pass")
or die ("could not connect");
$q="select * from perv('$param1'::varchar
, '$param2'::varchar, '$param3'::varchar);";
$res=pg_query($con,$q);
//print_r($q);
//die();
if(pg_num_rows($res))
{
	$data=array();
	while($row=pg_fetch_array($res))
	{
		$data[] = ['id'=>$row['id'], 
		'name'=>$row['name'], 
		'familia'=>$row['familia'], 
		'othestvo'=>$row['othestvo']];
	}
	header('Content-Type: application/json; charset=utf-8');
//$data = array_slice($data, 0, 0);
	$data = str_replace("\\","",$data);
        
	$j = json_encode($data);
echo($j);
}

