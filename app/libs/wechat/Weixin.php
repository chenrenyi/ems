<?php
require_once(dirname(__FILE__)."/autoload.php");

use Overtrue\Wechat\Server;


//$server->on('message', function($message){
    //return "这是毕设的测试账号，相关功能正在开发中...";
//});
//echo $server->serve();

class Weixin {

    private static $instance;
    private static $appId = 'wxcdf4bed6d3babbe8';
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
    public static function app() {
        if(!isset(self::$instance)) {
            self::$instance = new Server(self::$appId, self::$token);
        }
        return self::$instance;
    }
}
