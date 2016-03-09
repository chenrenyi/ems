<?php
require "wechat/autoload.php";

use Overtrue\Wechat\Server;

$appId = 'wxbd24ddbdbbf97af3';
$token = "weixin";

$server = new Server($appId, $token);
$server->on('message', function($message){
    return "这是毕设的测试账号，相关功能正在开发中...";
});
echo $server->serve();
