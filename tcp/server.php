<?php
//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501); 

//监听连接进入事件
$serv->on('connect', function ($serv, $fd) {  
    echo "Client: Connect.\n";
});

//监听数据发送事件
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "监听客户端发送: ".$data);
});

//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {
    echo "客户端: 关闭.\n";
});

//启动服务器
$serv->start(); 