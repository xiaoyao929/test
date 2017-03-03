<?php 
//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("0.0.0.0", 9502);

//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
	file_put_contents( __DIR__ .'/log.txt' , $request->fd);
    // var_dump($request->fd, $request->get, $request->server);
    // $ws->push($request->fd, "hello, welcome\n");
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
	global $client;
    $data = $frame->data;
    $m = file_get_contents( __DIR__ .'/log.txt');
    for ($i=1 ; $i<= $m ; $i++) {
        echo PHP_EOL . '  i is  ' . $i .  '  data  is '.$data  . '  m = ' . $m;
        $ws->push($i, $data );
    }
    // echo "Message: {$frame->data}\n";
    // $ws->push($frame->fd, "server: {$frame->data}");
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();