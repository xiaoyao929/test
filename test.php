<?php
	$redis = new Redis();
	$con = $redis->connect("127.0.0.1",6379);
	$count = $redis->llen("goods_store");
	echo $count;
	die;

