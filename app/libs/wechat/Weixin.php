<?php
require_once(dirname(__FILE__)."/autoload.php");

use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\Broadcast;
use Overtrue\Wechat\Auth as WeixinAuth;


//$server->on('message', function($message){
    //return "这是毕设的测试账号，相关功能正在开发中...";
//});
//echo $server->serve();

class Weixin {

    private static $instance;
    private static $apps;
    private static $appId = 'wxcdf4bed6d3babbe8';
    private static $sercet = 'f4e94154e2251f83b62af260ddd1dabe';
    private static $token = "weixin";

    public static function test() {
        echo "yes";
    }

    public function test2() {
        echo 'test2 successed';
    }

    public function __constrct() {
    }

    public function __clone() {
        trigger_error('Clone is not allow', E_USER_ERROR);
    }

    // 返回单例
    public static function sigleton() {
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function app($type) {
        if(!in_array($type, ['serve', 'broadcast', 'js', 'auth'])) {
            throw new Exception('app type is not correct');
        }

        if(!isset(self::$apps[$type])) {
            if($type == 'serve') {
                 $app = new Server(self::$appId, self::$token);
            }
            if($type == 'broadcast') {
                 $app = new Broadcast(self::$appId, self::$sercet);
            }
            if($type == 'auth') {
                 $app = new WeixinAuth(self::$appId, self::$sercet);
            }
            self::$apps[$type] = $app;
        }
        return self::$apps[$type];
    }

    //群发消息
    public function send($message, $groupId=null) {
        $boardcast = self::app('broadcast');
        if($groupId === null) {
            $boardcast->send($message)->to();
        } else {
            $boardcast->send($message)->to($groupId);
        }
    }

    public function makeMsg($type, $content) {
        if($type == 'text') {
            $message = Message::make('text')->content($content);
        }
        return $message;
    }
}
