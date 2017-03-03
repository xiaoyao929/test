<?php
$server=new swoole_server('127.0.0.1',9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

// listen 
$server->on('Packet',function($server,$data,$clientinfo){
	$server->sendto($clientinfo['address'],$clientinfo['port'],"Server ".$data);

	var_dump($clientinfo);
});

$server->start();